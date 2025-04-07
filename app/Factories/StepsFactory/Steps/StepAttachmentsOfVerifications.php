<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DInvoiceEnum\DInvoicePayedStatus;
use App\Enums\DInvoiceEnum\DInvoiceState;
use App\Enums\DInvoiceEnum\DInvoiceType;
use App\Enums\DProjectDecisionEnum;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use App\Enums\DProjectOperationEnum\DProjectOperationState;
use App\Enums\PStepEnum\PStepOrder;
use App\Exceptions\CustomException;
use App\Models\DProjectDecision;
use App\Models\DProjectInvoiceHeader;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Services\DProjectInvoiceHeaderServices\DProjectInvoiceHeaderService;
use Carbon\Carbon;

class StepAttachmentsOfVerifications
{
    public $dProject;

    public $step;

    public function __construct(&$dProject)
    {
        $this->dProject = $dProject;
        $this->step = PStep::where('reference', class_basename($this))->first();
    }

    public function init()
    {
        $stepDocuments = PStepDocument::where(
            'order_step',
            $this->dProject->current_step_order
        )->get();
        $stepDocuments->map(function ($document) {
            return checkDocumentBeforeCreate($document, $this->dProject);
        });
        DProjectDecision::firstOrCreate([
            'condition' => 'accompaniement',
            'd_project_id' => $this->dProject->id,
            'required' => 1,
            'decision' => 0,
            'order_step' => $this->step->order,
        ]);
    }

    public function stepAction()
    {
    }

    public function requirements()
    {
        if (
            $this->stepProjectDecision()->decision ==
            DProjectDecisionEnum::NOT_ACCEPTED->value
        ) {
            throw new CustomException('Le projet est terminé.');
        }

        // $works = $this->dProject->works;
        // if (!count($works)) {
        //     throw new CustomException('Veuillez séléctionner au moins un travaux.');
        // }

        // $works->each(function ($work) {

        //     if (!$work->d_work_id) {
        //         throw new CustomException('Aucun travaux séléctionné.');
        //     }
        // });

        $documents = $this->dProject->documents
            ->where('required', 1)->where('order_step', '<=', PStepOrder::StepAttachmentsOfVerifications->value);
        if (!count($documents)) {
            throw new CustomException('Aucun document trouvé');
        }

        $documents->each(function ($document) {
            if (!$document->version_count) {
                throw new CustomException($document->pDocument->entitled . ' non trouvé');
            }

            if (
                $document->required && $document->status !=
                DProjectDocumentStatus::SATISFIED->value
            ) {
                throw new CustomException($document->name . ' non signé');
            }
        });
    }

    public function nextStepAction()
    {
        $decision = $this->stepProjectDecision();
        $decision->decision = DProjectDecisionEnum::ACCEPTED->value;
        $decision->save();
        $document = PStepDocument::where('type_doc', 16)->first();
        checkDocumentBeforeCreate($document, $this->dProject);
        // $this->createInvoiceHeader();
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
        //     $dCompany = $this->dProject->installer?->company;
        //     if ($dCompany?->profile == DCompanyProfile::INS->value && $this->dProject->cleared_step_order < 9) {
        //         $message = __('notifications.project.invoice.waiting_for_installer', [
        //             'reference' => $this->dProject->reference,
        //         ]);
        //         $configUrl = str_replace(
        //             ':id',
        //             $this->dProject->id,
        //             config('custom_routes.projects.create')
        //         );
                // sendNotificationCompany(
                //     'Facturation pour le projet en attente de votre action',
                //     $message,
                //     $configUrl,
                //     $dCompany,
                //     $dCompany->representative_last_name . ' ' . $dCompany->representative_first_name,
                // );
        //     }
        // } catch (\Throwable $th) {
        // }

        $audit_operation = $this->dProject->operations->where('p_operation_id', 2)->first();
        if ($audit_operation->state !== DProjectOperationState::FINISHED->value) {
            $documentTypeToFinishAuditOperation = ['3', '6'];
            $documents = $this->dProject->documents->whereIn('type_doc', $documentTypeToFinishAuditOperation);
            $flag = true;

            foreach ($documents as $document) {
                if ($document->status !== 4) {
                    $flag = false;
                    break;
                }
            }
            // try {
            //     if ($this->dProject->cleared_step_order == $this->dProject->current_step_order) {
            //         $message = __('notifications.project.steps.terminer.description', [
            //             'step' => $this->step->display_name,
            //             'reference' => $this->dProject->reference
            //         ]);
            //         $subject = __('notifications.project.steps.terminer.subject', [
            //             'step' => $this->step->display_name
            //         ]);
            //         $configUrl = str_replace(
            //             ':id',
            //             $this->dProject->id,
            //             config('custom_routes.projects.edit')
            //         );

            //         sendNotificationCompany(
            //             $subject,
            //             $message,
            //             $configUrl,
            //             $this->dProject->company,
            //         );
            //     }
            // } catch (\Throwable $th) {
            // }
        }
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
        return DProjectDecision::where('condition', 'accompaniement')
            ->where('d_project_id', $this->dProject->id)
            ->first();
    }

    public function createInvoiceHeader()
    {
        $user = auth()->user();
        $company = $user->company;
        $invoiceService = new DProjectInvoiceHeaderService(new DProjectInvoiceHeader());
        $currentDate = Carbon::now();

        $newDate = $currentDate->addDays(3);

        $invoiceHeader = $this->dProject->invoices->where(
            'type',
            DInvoiceHeaderType::MAR->value
        )->first();

        if ($invoiceHeader) {
            $invoiceHeader->lines()->delete();
        } else {
            $dataInvoiceHeader = [
                'reference' => getNextInvoice($company->id, DInvoiceType::DEVIS->value),
                'd_company_id' => $user->userable_id,
                'd_project_id' => $this->dProject->id,
                'creator' => $user->id,
                'start_date' => $currentDate,
                'end_date' => $newDate,
                'state' => DInvoiceState::PRE_INVOICE->value,
                'type' => DInvoiceHeaderType::MAR->value,
                'is_billed' => DInvoicePayedStatus::INPROGRESS->value,
                'status' => DProjectInvoiceHeaderStatusEnum::VALIDATED->value,
            ];
            $invoiceHeader = $invoiceService->create($dataInvoiceHeader);
        }
        $amountHT = 0;
        $amountTTC = 0;
        $this->dProject->works->each(function ($work) use (
            $invoiceHeader,
            $user,
            &$amountHT,
            &$amountTTC
        ) {
            $tva = $user->company->tva;
            $workLine = $invoiceHeader->lines()->create([
                'd_project_invoice_header_id' => $invoiceHeader->id,
                'designation' => $work->work->reference,
                'd_work_id' => $work->work->id,
                'amount_HT' => $work->cost_ht,
                'tva' => $tva,
                'unit' => $work->unit,
                'type' => 2,
                'amount_TTC' => $work->cost_ht + ($tva * $work->cost_ht),
            ]);

            $amountHT += $workLine->amount_HT;
            $amountTTC += $workLine->amount_TTC;

            $invoiceHeader->lines()->create([
                'd_project_invoice_header_id' => $invoiceHeader->id,
                'd_work_id' => $work->work->id,
                'unit_price_HT' => $work->cost_ht,
                'tva' => $tva,
                'amount_HT' => $work->cost_ht,
                'amount_TTC' => $work->cost_ht + ($tva * $work->cost_ht),
                'unit_price_TTC' => $work->cost_ht + ($tva * $work->cost_ht),
                'unit' => $work->unit,
                'type' => 0,
                'qty' => $work->qty,
                'parent_id' => $workLine->id,
            ]);
        });

        $invoiceHeader->update([
            'HT_total' => $amountHT,
            'TTC_total' => $amountTTC,
        ]);
    }
}
