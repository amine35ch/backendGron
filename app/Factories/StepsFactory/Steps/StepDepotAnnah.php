<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DProjectDocument;
use App\Models\DProjectDocumentVersion;
use App\Models\PDocument;
use App\Models\PStep;
use App\Services\DProjectDocumentVersionServices\DProjectDocumentVersionService;
use Illuminate\Support\Facades\Log;

class StepDepotAnnah
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

        // $this->dProject->state = $this->step->state_init;
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
        if (!$this->dProject->depot_anah_1) {
            throw new CustomException(__('exceptions.depot_anah'));
        }
    }
    public function nextStepAction()
    {
        stepNotification($this->dProject, $this->step);
    }
    public function nextStep()
    {

        $this->dProject->current_step_order = $this->step->next_step_order;
        $this->dProject->anah_date = now();
        $this->generateDocuments();
    }

    public function generateDocuments()
    {
        $pDocument = PDocument::where('reference', "BonDeTravailData")->first();
        $confirmedQuotes = DProjectDocument::where(
            'type_doc',
            16
        )->where(
            'd_project_id',
            $this->dProject->id
        )->whereNotNull('type_doc')->get();

        foreach ($confirmedQuotes as $key => $quote) {
            if ($quote->d_company_id != null) {
                $dCompany = DCompany::where('id', $quote->d_company_id)->first();

                $documentProject = DProjectDocument::where(
                    'type_doc',
                    17
                )->where(
                    'd_company_id',
                    $dCompany->id
                )->where(
                    'd_project_id',
                    $this->dProject->id
                )->first();

                if (!$documentProject) {
                    $documentProject = DProjectDocument::create(
                        [
                            'd_project_id' => $this->dProject->id,
                            'd_company_id' => $dCompany->id,
                            'type_doc' => 17,
                            'name' => 'Bon de Travail (' . $dCompany->trade_name . ')',
                            'order_step' => 10,
                            'path' => null,
                            'version_count' => 0,
                            // 'nature_doc' => $pDocument->nature_type
                            'nature_doc' => 1
                        ]
                    );

                    // setProjectHistory(
                    //     $this->dProject,
                    //     __(
                    //         'logs.project.generate_document.action',
                    //         [
                    //             'document' => $pDocument->entitled,
                    //             'admin' => auth()->user()->username,
                    //         ]
                    //     ),
                    //     $message
                    // );

                    // setLog($message . $this->dProject->reference);
                    $count = $documentProject->version_count + 1;
                    if ($documentProject) {
                        // DProjectDocumentVersion::create([
                        //     'name' => $documentProject->name,
                        //     'path' => null,
                        //     'document_id' => $documentProject->id,
                        //     'default' => $count == 1 ? 1 : 0,
                        //     'version' => 'Version ' . $count,
                        // ]);
                        // $status = $pDocument->signature ?
                        //     DProjectDocumentStatus::HAS_SOMETHING->value :
                        //     DProjectDocumentStatus::SATISFIED->value;

                        // $documentProject->update([
                        //     'path' => null,
                        //     'version_count' => $count,
                        //     'status' => $status,
                        // ]);
                    }
                }
            }
        }
    }
    public function previousStepAction() {}
    public function previousStep() {}
}
