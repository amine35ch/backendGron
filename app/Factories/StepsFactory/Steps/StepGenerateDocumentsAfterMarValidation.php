<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectState;
use App\Exceptions\CustomException;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Traits\StepMethodsTrait;

class StepGenerateDocumentsAfterMarValidation
{
    use StepMethodsTrait;

    public $dProject;

    public $step;

    public function __construct(&$dProject)
    {
        $this->dProject = $dProject;
        $this->step = PStep::where('reference', class_basename($this))->first();

        $stepDocuments = PStepDocument::where(
            'order_step',
            $this->dProject->current_step_order
        )
            ->get();
        $stepDocuments->map(function ($document) {
            return checkDocumentBeforeCreate($document, $this->dProject);
        });
    }

    public function init()
    {
        // $this->dProject->state = $this->step->state_init;
    }

    public function stepAction()
    {
    }

    public function requirements()
    {
        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);
        // if (!count($documents)) {
        //     throw new CustomException('Veuillez insérer les documents');
        // }
        foreach ($documents as $document) {
            if (!$document->version_count) {
                throw new CustomException($document->pDocument->entitled.' non trouvé');
            }
            if (
                $document->required
                && $document->status != DProjectDocumentStatus::SATISFIED->value
            ) {
                throw new CustomException($document->pDocument->entitled.' est non satisfait');
            }
        }
    }

    public function nextStepAction()
    {
        // stepNotification($this->dProject,$this->step);
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
        $this->dProject->state = DProjectState::FIRSTDEPOT->value;
        // $this->dProject->work_actual_start = now();
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
}
