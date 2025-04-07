<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DInvoiceEnum\DInvoicePayedStatus;
use App\Enums\DInvoiceEnum\DInvoiceState;
use App\Enums\DInvoiceEnum\DInvoiceType;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use App\Exceptions\CustomException;
use App\Models\DArticlePrice;
use App\Models\DProjectInvoiceHeader;
use App\Models\DProjectOperation;
use App\Models\PDocument;
use App\Models\PMarScale;
use App\Models\PStep;
use App\Models\PStepDocument;
use App\Services\DProjectInvoiceHeaderServices\DProjectInvoiceHeaderService;
use App\Traits\StepMethodsTrait;
use Carbon\Carbon;

class StepGenerateInitialDocument
{
    use StepMethodsTrait;

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
        $stepDocuments = PStepDocument::where(
            'order_step',
            $this->dProject->current_step_order
        )->get();
        $stepDocuments->map(function ($document) {
            return checkDocumentBeforeCreate($document, $this->dProject);
        });
    }

    public function requirements()
    {
        // $documents = $this->dProject->documents->where(
        //     'p_step_id',
        //     $this->dProject->current_step_order
        // )->where('required', 1);
        // if (!count($documents)) {
        //     throw new CustomException('Veuillez insérez les documents');
        // }
        // foreach ($documents as $document) {

        //     if (!$document->latest_version) {
        //         throw new CustomException($document->pDocument->entitled . ' non trouvé');
        //     }

        //     if ($document->required && !$document->status) {
        //         throw new CustomException($document->pDocument->entitled . ' est non satisfait');
        //     }
        // }
    }

    public function nextStepAction()
    {
        // stepNotification($this->dProject, $this->step);
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
        // $this->signDocuments();

        // try {
        //     if ($this->dProject->cleared_step_order == $this->dProject->current_step_order) {
        //         $message = __('notifications.project.steps.terminer.description', [
        //             'step' => $this->step->display_name,
        //             'reference' => $this->dProject->reference,
        //         ]);
        //         $subject = __('notifications.project.steps.terminer.subject', [
        //             'step' => $this->step->display_name,
        //         ]);
        //         $configUrl = str_replace(
        //             ':id',
        //             $this->dProject->id,
        //             config('custom_routes.projects.edit')
        //         );

        //         sendNotificationCompany(
        //             $subject,
        //             $message,
        //             $configUrl,
        //             $this->dProject->company,
        //         );
        //     }
        // } catch (\Throwable $th) {
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

    public function stepProjectDecision()
    {
    }

 

   
}
