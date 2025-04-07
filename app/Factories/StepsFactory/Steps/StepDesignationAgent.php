<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Exceptions\CustomException;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProjectServices\DProjectService;
use App\Traits\StepMethodsTrait;

class StepDesignationAgent
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
        $auditor = $this->dProject->auditor;
        if (!$auditor) {
            throw new CustomException('Vous devez sélectionner un auditeur');
        }
        $installer = $this->dProject->installer_company;
        if (!$installer) {
            throw new CustomException('Vous devez sélectionner une entreprise retenu');
        }
    }

    public function nextStepAction()
    {
        // stepNotification($this->dProject,$this->step);
        $pDocument = PDocument::where('reference', 'mandatData')->first();
        if ($pDocument) {
            $document = $this->checkDocument($this->dProject, $pDocument);
            if ($document->versions->count() == 0) {

                (new DDocumentService())->setGeneratedDocument($this->dProject, $pDocument);
            }
        }
        // $this->signDocuments();

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
        //         sendNotificationCompany(
        //             $subject,
        //             $message,
        //             $configUrl,
        //             $this->dProject->installer_company,
        //         );
        //         $mandataireAdmin = $this->dProject->mandataire_admin_company;
        //         $mandataireFin = $this->dProject->mandataire_fina_company;
        //         $auditorCompany = $this->dProject->auditor_company;
        //         if ($auditorCompany == DCompanyProfile::AUD->value) {
        //             sendNotificationCompany(
        //                 $subject,
        //                 $message,
        //                 $configUrl,
        //                 $auditorCompany,
        //             );
        //         }
        //         if ($mandataireAdmin->profile == DCompanyProfile::MAN->value) {
        //             sendNotificationCompany(
        //                 $subject,
        //                 $message,
        //                 $configUrl,
        //                 $mandataireAdmin,
        //             );
        //         }
        //         if ($mandataireFin->profile == DCompanyProfile::MAN->value && $mandataireFin->id !==  $mandataireAdmin->id) {
        //             sendNotificationCompany(
        //                 $subject,
        //                 $message,
        //                 $configUrl,
        //                 $mandataireFin,
        //             );
        //         }
        //     }
        // } catch (\Throwable $th) {
        // }

        $this->createCerfa();

    }

    public function createCerfa(){
        $mandataireAdmin = $this->dProject->mand_adm->company;
        $mandataireFin = $this->dProject->mand_fin->company;
        $dProjectDocuments = DProjectDocument::whereIn('type_doc', [PDocumentType::CERFA16089_02_MANDAT_GENERAL->value, PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value, PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value])->where('d_project_id', $this->dProject->id)->get();
        if (isset($dProjectDocuments)) {
            foreach ($dProjectDocuments as $key => $dProjectDocument) {
                $dProjectDocument->versions()->delete();
                $dProjectDocument->viewDocuments()->delete();
                $dProjectDocument->delete();
            }
        }
        $dProjectService = app(DProjectService::class);
        if (isset($mandataireAdmin) && isset($mandataireFin)) {
            if ($mandataireAdmin->id == $mandataireFin->id) {
                $mandatGeneral = PDocument::where('type', PDocumentType::CERFA16089_02_MANDAT_GENERAL->value)->first();
                $document = null;
                if ($mandatGeneral) {
                    $document = checkDocumentBeforeCreate($mandatGeneral, $this->dProject);
                    if ($document->versions->count() == 0) {
                        $dProjectService->setGeneratedDocument($this->dProject, $mandatGeneral);
                    }
                }
            } else {

                $mandatAdmin = PDocument::where('type', PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value)->first();

                if ($mandatAdmin) {
                    $document = checkDocumentBeforeCreate($mandatAdmin, $this->dProject);
                    if ($document->versions->count() == 0) {
                        $dProjectService->setGeneratedDocument($this->dProject, $mandatAdmin);
                    }
                }

                $mandatFin = PDocument::where('type', PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value)->first();
                if ($mandatFin) {
                    $mandat = checkDocumentBeforeCreate($mandatFin, $this->dProject);
                    if ($mandat->versions->count() == 0) {
                        $dProjectService->setGeneratedDocument($this->dProject, $mandatFin, $mandat);
                    }
                }
            }
        }
    }

    public function nextStep()
    {
        $this->dProject->current_step_order = $this->step->next_step_order;
    }

    public function previousStepAction() {}

    public function previousStep() {}

    public function checkDocument($dProject, $document)
    {
        $documentProject = DProjectDocument::where('name', $document->entitled)
            ->where('type_doc', $document->type)
            ->where('d_project_id', $dProject->id)->first();
        if (!$documentProject) {
            $stepDocument = PStepDocument::where(
                'order_step',
                $this->dProject->current_step_order
            )->where('type_doc', $document->type)->first();

            return DProjectDocument::firstOrCreate([
                'type_doc' => $document->type,
                'order_step' => $document->order_step,
                'name' => $document->entitled,
                'required' => $stepDocument->required ?? 0,
                'd_project_id' => $dProject->id,
                'exported' => $document->exported ?? 0,
                'status' => DProjectDocumentStatus::NEW->value,
            ]);
        }

        return $documentProject;
    }
}
