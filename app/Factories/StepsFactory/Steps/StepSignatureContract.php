<?php

namespace App\Factories\StepsFactory\Steps;

use App\Models\PStep;
use App\Models\PStepDocument;

class StepSignatureContract
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

        PStepDocument::where(
            'order_step',
            $this->dProject->current_step_order
        )->get()->map(function ($document) {
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
