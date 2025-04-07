<?php

namespace App\Factories\StepsFactory\Steps;

use App\Exceptions\CustomException;
use App\Models\PStep;

class StepSignatureAfterFormSatisfaction
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
        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);

        foreach ($documents as $document) {

            if ($document->required && ! $document->satisfied) {
                throw new CustomException($document->reference.' non signé');
            }
        }
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
