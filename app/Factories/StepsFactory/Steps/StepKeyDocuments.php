<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectEnum\DProjectStatus;
use App\Exceptions\CustomException;
use App\Models\PStep;
use App\Models\PStepDocument;

class StepKeyDocuments
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
        if ($this->dProject->status < DProjectStatus::PENDING->value) {

            $this->dProject->status = DProjectStatus::PENDING->value;
        }
        // $this->dProject->state = $this->step->state_init;
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
        if ($this->dProject->status != DProjectStatus::INSERTED->value) {

            throw new CustomException('Veuillez envoyer les documents vers ANAH');
        }
    }

    public function nextStepAction()
    {
        $this->dProject->update(['anah_date' => now()]);

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
        //     ));

            // try {
            //     if ($this->dProject->cleared_step_order == $this->dProject->current_step_order) {
            //         $message=__('notifications.project.steps.terminer.description',[
            //             'step'=>$this->step->display_name,
            //             'reference'=>$this->dProject->reference
            //         ]);
            //         $subject=__('notifications.project.steps.terminer.subject',[
            //             'step'=>$this->step->display_name
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
}
