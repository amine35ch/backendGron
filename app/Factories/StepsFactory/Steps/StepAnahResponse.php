<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectDocumentEnum\DProjectDocumentStatus;
use App\Enums\DProjectEnum\DProjectAnahResponseEnum;
use App\Enums\DProjectEnum\DProjectIncomeClassEnum;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\PDocumentEnum\PDocumentType;
use App\Exceptions\CustomException;
use App\Models\PStep;
use App\Models\PStepDocument;

class StepAnahResponse
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
        // $this->dProject->state = $this->step->state_init;
    }

    public function stepAction() {}

    public function requirements()
    {
        if ($this->dProject->anah_first_depot_response_state !== DProjectAnahResponseEnum::APPROVED->value) {
            throw new CustomException(__('exceptions.depot_anah_response'));
        }
        $documents = $this->dProject->documents->where(
            'order_step',
            $this->dProject->current_step_order
        )->where('required', 1);
        $documents = collect($documents)->reject(function ($document) {
            if (
                $this->dProject->income_class < DProjectIncomeClassEnum::INTERMEDIARE->value
                && in_array($document->type_doc, [
                    PDocumentType::CERFA16089_02_MANDAT_GENERAL->value,
                    PDocumentType::CERFA16089_02_MANDAT_GENERAL_FINANCIER->value,
                    PDocumentType::CERFA16089_02_MANDAT_GENERAL_ADMINISTRATIF->value
                ])
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
        // if (! count($documents)) {
        //     throw new CustomException('Veuillez insérer les documents');
        // }
        foreach ($documents as $document) {
            if (!$document->version_count) {
                throw new CustomException($document->pDocument->entitled . ' non trouvé');
            }

            if ($document->required && $document->status != DProjectDocumentStatus::SATISFIED->value) {
                throw new CustomException($document->pDocument->entitled . ' est non satisfait');
            }
        }
    }

    public function nextStepAction()
    {
        $this->dProject->state = DProjectState::ONGOING->value;
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

        try {
            if ($this->dProject->cleared_step_order == $this->dProject->current_step_order) {
                $message = __('notifications.project.steps.terminer.description', [
                    'step' => $this->step->display_name,
                    'reference' => $this->dProject->reference,
                ]);
                $subject = __('notifications.project.steps.terminer.subject', [
                    'step' => $this->step->display_name,
                ]);
                $configUrl = str_replace(
                    ':id',
                    $this->dProject->id,
                    config('custom_routes.projects.edit')
                );

                // sendNotificationCompany(
                //     $subject,
                //     $message,
                //     $configUrl,
                //     $this->dProject->company,
                // );
            }
        } catch (\Throwable $th) {
        }
    }

    public function nextStep()
    {
        $this->dProject->current_step_order = $this->step->next_step_order;
    }

    public function previousStepAction() {}

    public function previousStep() {}

    public function setEndEvent() {}
}
