<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Exceptions\CustomException;
use App\Models\DProjectDocument;
use App\Models\PDocument;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Services\DDocumentServices\DDocumentService;

class StepGenerateReceptionSiteInspection
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

    public function requirements()
    {
        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);
        // if (! count($documents)) {
        //     throw new CustomException('Veuillez insérez les documents');
        // }
        foreach ($documents as $document) {
            if (!$document->version_count) {
                throw new CustomException($document->pDocument->entitled . ' non trouvé');
            }

            if (
                $document->required && $document->status !=
                DProjectDocumentStatus::SATISFIED->value
            ) {
                throw new CustomException($document->pDocument->entitled . ' est non satisfait');
            }
        }
    }

    public function nextStepAction()
    {
        $pDocument = PDocument::where('reference', 'primePaimentDemandData')->first();

        if ($pDocument) {
            $document = $this->checkDocument($this->dProject, $pDocument);
            if ($document->versions->count() == 0) {
                (new DDocumentService())->setGeneratedDocument($this->dProject, $pDocument);
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
        if ($this->dProject->cleared_step_order < 14) {
            $this->dProject->work_actual_end = now();
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
