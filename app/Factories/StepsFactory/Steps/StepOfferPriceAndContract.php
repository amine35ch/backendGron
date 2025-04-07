<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Services\DDocumentServices\DDocumentService;
use App\Services\DProjectServices\DProjectService;

class StepOfferPriceAndContract
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
    }

    public function stepAction()
    {
    }

    public function requirements()
    {
    }

    public function nextStepAction()
    {
        $dProjectService = app(DProjectService::class);
        $pDocuments = PDocument::whereIn('type', [PDocumentType::CONTRAT->value, PDocumentType::OFFRE_DE_DEVIS->value])->get();
        foreach ($pDocuments as $pDocument) {
            $document = $dProjectService->checkDocumentBeforeCreate($this->dProject, $pDocument);
            if ($document->versions->count() == 0) {

                $dProjectService->setGeneratedDocument($this->dProject, $pDocument);
            }
        }

        // stepNotification($this->dProject,$this->step);
        // $pDocuments = PDocument::where('reference', 'InvoiceMarData')->orWhere('reference','ContractMarData')->get();
        $dProject = $this->dProject;
        // foreach ($pDocuments as $pDocument) {
        //     if ($pDocument) {
        //         $document = $this->checkDocument($dProject, $pDocument);
        //         if (! $document->version_count) {

        //             (new DDocumentService())->setGeneratedDocument($dProject, $pDocument);
        //         }
        //     }
        // }

        // createNotificationProject(
        //     $dProject,
        //     __(
        //         'notifications.project.steps.terminer.subject',
        //         [
        //             'step' => $dProject->step->display_name,
        //         ]
        //     ),
        //     getParentCompany(),
        //     __(
        //         'notifications.project.steps.terminer.description',
        //         [
        //             'step' => $dProject->step->display_name,
        //         ]
        //     )
        // );
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

    public function checkDocument($dProject, $document)
    {
        $documentProject = DProjectDocument::where('type_doc', $document->type)
            ->where('d_project_id', $dProject->id)->first();

        if (!$documentProject) {
            $stepDocument = PStepDocument::where(
                'type_doc',
                $document->type
            )->first();

            return DProjectDocument::firstOrCreate([
                'type_doc' => $document->type,
                'order_step' => 4,
                'name' => $document->entitled,
                'required' => $stepDocument->required,
                'd_project_id' => $dProject->id,
                'exported' => $document->exported ?? 0,

                'status' => DProjectDocumentStatus::NEW->value,
            ]);
        }

        return $documentProject;
    }
}
