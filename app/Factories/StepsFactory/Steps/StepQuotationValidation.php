<?php

namespace App\Factories\StepsFactory\Steps;

use App\Exceptions\CustomException;
use App\Models\PStep;

class StepQuotationValidation
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
        // $documents = $this->dProject->documents->where(
        //     'p_step_id',
        //     $this->dProject->current_step_order
        // )->where('required', 1);
        // foreach ($documents as $document) {
        //     if (!$document->version_count) {
        //         throw new CustomException($document->pDocument->entitled . ' non trouvé');
        //     }
        //     if ($document->required && !$document->status) {
        //         throw new CustomException($document->name . ' non signé');
        //     }
        // }
    }

    public function nextStepAction()
    {
        // try {
        //     $users = [];
        //     $this->dProject->operations->each(function ($operation) use (&$users) {

        //         $operation->company->users->each(function ($user) use (&$users) {
        //             $users[] = $user;
        //         });
        //     });
        //     notifyUsers(
        //         'Validation de devis pour le projet ' .
        //             $this->dProject->reference,
        //         'Le bénéficiaire ' .
        //             $this->dProject->client->reference . ' a validé le devis.',
        //         $users,
        //         '/projects/' . $this->dProject->id . '/details',
        //         true,
        //     );
        // } catch (CustomException $exp) {
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
}
