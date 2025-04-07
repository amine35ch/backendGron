<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Exceptions\CustomException;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectInvoiceLine;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Traits\StepMethodsTrait;

class StepAuditRapport
{
    use StepMethodsTrait;

    public $dProject;

    public $step;

    public function __construct(&$dProject)
    {
        $this->dProject = $dProject;
        $this->step = PStep::where('reference', class_basename($this))->first();
    }

    public function init()
    {
        // $this->dProject->state = $this->step->state_init;
        $stepDocuments = PStepDocument::where(
            'order_step',
            $this->dProject->current_step_order
        )->get();
        $stepDocuments->map(function ($document) {
            return checkDocumentBeforeCreate($document, $this->dProject);
        });
    }

    public function stepAction() {}

    public function requirements()
    {
        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);
        $documents = collect($documents)->reject(function ($document) {
            if (
                $this->dProject->income_class < DProjectIncomeClassEnum::INTERMEDIARE->value
                && in_array($document->type_doc, [
                    PDocumentType::CERFA16089_02_MANDAT_GENERAL->value,
                    PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value,
                    PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value
                ])
            ) {
                return true;
            } elseif (
                $this->dProject->income_class >= DProjectIncomeClassEnum::INTERMEDIARE->value
                && $this->dProject->income_class != DProjectIncomeClassEnum::AUCUN->value
                && $document->type_doc == PDocumentType::MONDAT_CERFA->value
            ) {
                return true;
            }

            return false;
        });
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
        if (!$this->dProject->audit_identifier) {
            throw new CustomException(__('exceptions.form_devis'));
        }
    }

    public function nextStepAction()
    {
        $dProjectInvoice = DProjectInvoiceHeader::where('type', DInvoiceHeaderType::INSTALLER->value)->where('d_project_id', $this->dProject->id)->first();
        if (!$dProjectInvoice) {
            $this->createInstallerInvoice($this->dProject, $this->dProject->works);
        }
        // stepNotification($this->dProject, $this->step);
        // try {
        //     if ($this->dProject->cleared_step_order == $this->dProject->current_step_order) {
        //         $message = __('notifications.project.steps.terminer.description', [
        //             'step' => $this->step->display_name,
        //             'reference' => $this->dProject->reference,
        //         ]);
        //         $subject = __('notifications.project.steps.terminer.subject', [
        //             'step' => $this->step->display_name,
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

    public function createInstallerInvoice($dProject, $works)
    {
        if ($works) {
            $dProjectInvoiceHeader = DProjectInvoiceHeader::create([
                'invoice_date' => now(),
                'd_project_id' => $dProject->id,
                'HT_total' => $works->sum('cost_ht_simulation'),
                'TVA_total' => $works->sum('cost_ttc_simulation') - $works->sum('cost_ht_simulation'),
                'TTC_total' => $works->sum('cost_ttc_simulation'),
                'd_company_id' => $dProject->installer_company->id,
                'type' => DInvoiceHeaderType::INSTALLER->value,
            ]);
            foreach ($works as $work) {
                DProjectInvoiceLine::create([
                    'd_project_invoice_header_id' => $dProjectInvoiceHeader->id,
                    'designation' => $work->entitled,
                    'd_work_id' => $work->d_work_id,
                    'd_article_id' => $work->d_service_id,
                    'qty' => $work->qty_simulation,
                    'unit_price_HT' => $work->price_unit_ht_simulation,
                    'unit' => $work->unit,
                    'tva' => $work->tva,
                    'amount_HT' => $work->cost_ht_simulation,
                    'amount_TTC' => $work->cost_ttc_simulation,
                    'type' => 2,
                ]);
            }
        } else {
            $dProjectInvoiceHeader = DProjectInvoiceHeader::create([
                'd_project_id' => $dProject->id,
                'HT_total' => 0,
                'TVA_total' => 0,
                'TTC_total' => 0,
                'd_company_id' => $dProject->installer_company->id,
                'type' => DInvoiceHeaderType::INSTALLER->value,
            ]);
        }
    }

    public function nextStep()
    {
        $this->dProject->current_step_order = $this->step->next_step_order;
    }

    public function previousStepAction() {}

    public function previousStep() {}
}
