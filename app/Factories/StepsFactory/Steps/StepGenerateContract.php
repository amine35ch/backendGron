<?php

namespace App\Factories\StepsFactory\Steps;

use App\Exceptions\CustomException;
use App\Models\PStep;
use App\Models\PStepDocument;

class StepGenerateContract
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

        // $this->dProject->state = $this->step->state_init;
        $stepDocument = PStepDocument::where(
            'order_step',
            $this->dProject->current_step_order
        )->get();
        $stepDocument->map(function ($document) {
            return checkDocumentBeforeCreate($document, $this->dProject);
        });
    }

    public function stepAction()
    {
    }

    public function requirements()
    {
        // $documents = $this->dProject->documents->where(
        //     'p_step_id',
        //     $this->dProject->current_step_order
        // )->where('required', 1);
        // if (!count($documents)) {
        //     throw new CustomException('Contrat non trouvé');
        // }
        // foreach ($documents as $document) {

        //     if (!$document->latest_version) {
        //         throw new CustomException($document->pDocument->entitled . ' non trouvé');
        //     }

        //     if ($document->required && !$document->status) {
        //         throw new CustomException($document->name . ' non signé');
        //     }
        // }
    }

    public function nextStepAction()
    {
        // ! Envoi pour signature
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
