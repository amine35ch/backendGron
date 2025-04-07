<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\PTypeEventEnum\PTypeEventEnum;
use App\Models\PStep;

class StepPlanningForVisit
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

    public function stepAction()
    {
    }

    public function requirements()
    {
    }

    public function nextStepAction()
    {
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
    }

    public function nextStep()
    {
        $works = $this->dProject->works;

        $works->each(function ($work) {
            if (! $work->is_validated) {
                $step = PStep::where('reference', 'StepStartWorkPlanned')->first();
                $this->dProject->current_step_order = $step->id;
            }
        });

        $event = $this->dProject->events->where(
            'type',
            PTypeEventEnum::PLANNED_TRV->value
        )->last();

        $event->update([
            'type' => PTypeEventEnum::REAL_TRV->value,
            'end_date' => now(),
        ]);

        $this->dProject->current_step_order = $this->step->next_step_order;
    }

    public function previousStepAction()
    {
    }

    public function previousStep()
    {
    }
}
