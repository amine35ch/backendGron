<?php

namespace App\Factories\StepsFactory\Steps;

use App\Exceptions\CustomException;
use App\Models\DProjectDecision;
use App\Models\PStep;
use App\Models\PStepDocument;

class StepEnhancedSupportForANAH
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
        DProjectDecision::firstOrCreate([
            'condition' => 'enhanced_supported',
            'd_project_id' => $this->dProject->id,
            'required' => 1,
            'decision' => 0,
            'order_step' => $this->step->order,
        ]);

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
        if (! $this->stepProjectDecision()->decision) {
            throw new CustomException('Bénéficiaire non éligible.');
        }

        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);
        foreach ($documents as $document) {
            if (! $document->version_count) {
                throw new CustomException($document->pDocument->entitled.' non trouvé');
            }

            if ($document->required && ! $document->satisfied) {
                throw new CustomException($document->pDocument->entitled.' est non satisfait');
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

    public function stepProjectDecision()
    {
        return DProjectDecision::where('condition', 'enhanced_supported')
            ->where('d_project_id', $this->dProject->id)
            ->first();
    }
}
