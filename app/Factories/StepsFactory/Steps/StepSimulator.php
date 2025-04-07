<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DInvoiceEnum\DInvoicePayedStatus;
use App\Enums\DInvoiceEnum\DInvoiceState;
use App\Enums\DProjectDecisionEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use App\Exceptions\CustomException;
use App\Models\DArticlePrice;
use App\Models\DProject;
use App\Models\DProjectDecision;
use App\Models\DProjectInvoiceHeader;
use App\Models\PDocument;
use App\Models\PMarScale;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Services\DProjectInvoiceHeaderServices\DProjectInvoiceHeaderService;
use App\Services\DProjectServices\DProjectService;
use App\Services\PDocumentServices\PDocumentService;
use App\Services\SubscriptionServices\SubscriptionService;
use Carbon\Carbon;

class StepSimulator
{
    public $dProject;

    public $step;

    public $projectDecisions;

    public function __construct(&$dProject)
    {
        $this->dProject = $dProject;
        $this->step = PStep::where('reference', class_basename($this))->first();
    }

    public function init()
    {
        DProjectDecision::firstOrCreate([
            'condition' => 'eligible',
            'd_project_id' => $this->dProject->id,
            'required' => 1,
            'decision' => 0,
            'order_step' => $this->step->state_init,
        ]);
        // $stepDocuments = PStepDocument::where(
        //     'order_step',
        //     $this->dProject->current_step_order
        // )->get();
        // $stepDocuments->map(function ($document) {
        //     return checkDocumentBeforeCreate($document, $this->dProject);
        // });
    }

    public function requirements()
    {
        if (
            $this->stepProjectDecision()->decision ==
            DProjectDecisionEnum::NOT_ACCEPTED->value
        ) {
            throw new CustomException('Processus est déja terminé.');
        }
        $works = $this->dProject->works;
        if ($works->isEmpty()) {
            throw new CustomException(__('exceptions.simulation_missing'));
        }
    }

    public function createInvoiceHeader()
    {
        $user = auth()->user();
        $companyId = $user->userable_id;
        $invoiceService = new DProjectInvoiceHeaderService(new DProjectInvoiceHeader());
        $currentDate = Carbon::now();
        $amountHTTotal = 0;
        $amountTTCTotal = 0;
        $newDate = $currentDate->addDays(3);
        $invoiceHeader = $this->dProject->invoices->where(
            'type',
            DInvoiceHeaderType::MAR->value
        )->first();
        if (!$invoiceHeader) {
            // $invoiceHeader->lines()->delete();
            // } else {
            $dataInvoiceHeader = [
                'd_company_id' => $companyId,
                'd_project_id' => $this->dProject->id,
                'creator' => $user->id,
                'invoice_date' => $currentDate,
                'start_date' => $currentDate,
                'end_date' => $newDate,
                'state' => DInvoiceState::PRE_INVOICE->value,
                'type' => DInvoiceHeaderType::MAR->value,
                'is_billed' => DInvoicePayedStatus::INPROGRESS->value,
                'status' => DProjectInvoiceHeaderStatusEnum::VALIDATED->value,
            ];
            $invoiceHeader = $invoiceService->create($dataInvoiceHeader);
            $company = getCompanyOfConnectedUser();
            $articles = DArticlePrice::where('d_company_id', $companyId)->whereHas('article', function ($query) {
                $query->where('always', 1);
            })->get();
            foreach ($articles as $articlePrice) {
                $article = $articlePrice->article;
                $amountTTC = ($articlePrice->unit_price +
                    ($articlePrice->unit_price * $company->tva));
                $amountHT = $articlePrice->unit_price;
                $invoiceHeader->lines()->create([
                    'd_project_invoice_header_id' => $invoiceHeader->id,
                    'designation' => $article->designation,
                    'unit' => $article->unit,
                    'tva' => $company->tva,
                    'selling_price' => $articlePrice->unit_price,
                    'amount_HT' => $amountHT,
                    'amount_TVA' => $amountTTC - $amountHT,
                    'amount_TTC' => $amountTTC,
                    'unit_price_HT' => $amountHT,
                    'd_article_id' => $article->id,
                    'type' => 1,
                ]);
                $amountHTTotal += $amountHT;
                $amountTTCTotal += $amountTTC;
            }
            $tva = $amountTTCTotal - $amountHTTotal;
            $invoiceHeader->update([
                'HT_total' => $amountHTTotal,
                'TTC_total' => $amountTTCTotal,
                'TVA_total' => $tva,
            ]);
            $this->calculIncomClassRest($invoiceHeader, $amountHTTotal, $amountTTCTotal, $tva);
        }
        return true;
    }

    public function calculIncomClassRest($invoiceHeader, $amountHTTotal, $amountTTCTotal, $tva)
    {
        $scale = PMarScale::where('income_classe', $this->dProject?->income_class)->first();
        if (!$scale) {
            return true;
        }
        $TTC_anah = $scale->mar_scale * $scale->mar_cap;
        $HT_anah = ($TTC_anah * getCompanyOfConnectedUser()->tva) - $TTC_anah;
        $TVA_anah = ($TTC_anah + $HT_anah) * -1;
        $invoiceHeader->update([
            'TTC_rest' => $amountTTCTotal - $TTC_anah,
            'HT_rest' => $amountHTTotal + $HT_anah,
            'TVA_rest' => $tva + $TVA_anah,
            'TTC_anah' => $TTC_anah,
            'HT_anah' => $HT_anah,
            'TVA_anah' => $TVA_anah,
        ]);
    }

    public function nextStepAction()
    {
        $this->createInvoiceHeader();

        stepNotification($this->dProject, $this->step);
        $decision = $this->stepProjectDecision();
        $decision->decision = DProjectDecisionEnum::ACCEPTED->value;
        $decision->save();
        // (new DProjectService(new DProject(), new PDocumentService(new PDocument())))->generateSimulation(
        //     $this->dProject,
        // );
        $this->dProject->state = DProjectState::ONGOING->value;
        if ($this->dProject->cleared_step_order == $this->step->order) {
            $subscriptionService = new SubscriptionService();
            if (!$subscriptionService->checkCreateProject()) {
                throw new CustomException('Vous avez dépassé votre limite de création de projets gratuits.');
            }
        }
        // createNotificationProject(
        //     $this->dProject,
        //     __(
        //         'notifications.project.steps.terminer.subject',
        //         [
        //             'step' => $this->dProject->step->display_name,
        //         ]
        //     ),
        //     getParentCompany(),
        //     __(
        //         'notifications.project.steps.terminer.description',
        //         [
        //             'step' => $this->dProject->step->display_name,
        //         ]
        //     )
        // );
        // try {
        //     $message = __('notifications.project.eligible', [
        //         'reference' => $this->dProject->reference,
        //     ]);
        //     $configUrl = str_replace(
        //         ':id',
        //         $this->dProject->id,
        //         config('custom_routes.projects.create')
        //     );
        //     sendNotificationCompany(
        //         'Projet est éligible',
        //         $message,
        //         $configUrl,
        //         $this->dProject->company,
        //         $this->dProject->company->representative_last_name.' '.$this->dProject->company->representative_first_name,
        //     );
        //     $installer = $this->dProject->installer?->company;
        //     if ($installer) {
        //         sendNotificationCompany(
        //             'Projet est éligible',
        //             $message,
        //             $configUrl,
        //             $installer,
        //             $installer->representative_last_name.' '.$installer->representative_first_name,
        //         );
        //     }
        // } catch (\Throwable $th) {
        // }
    }

    public function nextStep()
    {
        $this->dProject->current_step_order = $this->step->next_step_order;
    }

    public function previousStepAction()
    {
    }

    public function previousStep()
    {
    }

    public function stepProjectDecision()
    {
        return DProjectDecision::where('condition', 'eligible')
            ->where('d_project_id', $this->dProject->id)
            ->first();
    }
}
