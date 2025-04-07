<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Exceptions\CustomException;
use App\Models\PStep;
use App\Models\PStepDocument;

class StepRegulations
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
        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);
        $documents = collect($documents)->reject(function ($document)  {
            if (
                $this->dProject->income_class < DProjectIncomeClassEnum::INTERMEDIARE->value
                && in_array($document->type_doc, [  PDocumentType::CERFA16089_02_MANDAT_GENERAL->value,
                PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value,
                PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value])
             ) {
                 return true;
             } elseif (
                $this->dProject->income_class >= DProjectIncomeClassEnum::INTERMEDIARE->value
                && $this->dProject->income_class != DProjectIncomeClassEnum::AUCUN->value
                && $document->type_doc == PDocumentType::MONDAT_CERFA->value
            ) {
                return true;
            }

             return false;
         });

        foreach ($documents as $document) {
            if (!$document->version_count) {
                throw new CustomException($document->pDocument->entitled.' non trouvé');
            }

            if ($document->required && $document->status != DProjectDocumentStatus::SATISFIED->value) {
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
}
