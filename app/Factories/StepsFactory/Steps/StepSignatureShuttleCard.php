<?php

namespace App\Factories\StepsFactory\Steps;

use App\Models\PStep;
use App\Models\PStepDocument;

class StepSignatureShuttleCard
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
        // PStepDocument::where(
        //     'p_step_id',
        //     $this->dProject->current_step_order
        // )->get()->map(function ($document) {
        //     return $this->checkDocumentBeforeCreate($document);
        // });
    }

    public function stepAction()
    {
        // ! DocuSignCode
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
