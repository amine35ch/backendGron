<?php

namespace App\Factories\StepsFactory\Steps;

use App\Exceptions\CustomException;
use App\Models\PStep;

class StepInstallerValidationByMar
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

        $works = $this->dProject->works;

        // $works->each(function ($work) {

        //     if (!$work->is_validated) {
        //         throw new CustomException('Veuillez valider tous les travaux.');
        //     }
        // });
    }

    public function nextStepAction()
    {
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
