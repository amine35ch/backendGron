<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum;
use App\Enums\DProjectOperationEnum\DProjectOperationState;
use App\Exceptions\CustomException;
use App\Models\PStep;

class StepTrackPayment
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
        $invoices = $this->dProject->invoices;
        foreach ($invoices as $invoice) {
            if ($invoice->status !== DProjectInvoiceHeaderStatusEnum::PAYED->value) {
                $type = 'Payment Travaux';
                if ($invoice->type == DInvoiceHeaderType::MAR->value) {
                    $type = 'Payment Accompagnement';
                }
                throw new CustomException($type . ' non payé');
            }
        }
    }

    public function nextStepAction()
    {
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
        //     ));
        $this->dProject->process_ended = 1;
        $this->dProject->state = DProjectState::COMPLETED->value;
        try {
            $this->sendInsNotif($this->dProject);
        } catch (\Throwable $th) {
        }
        $project_operations = $this->dProject->operations;
        foreach ($project_operations as $project_operation) {
            $project_operation->update([
                'state' => DProjectOperationState::FINISHED->value,
            ]);
        }
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

    public function sendInsNotif($dProject)
    {
        try {
            $message = __(
                'notifications.project.terminer',
                [
                    'reference' => $dProject->reference,
                ]
            );
            $configUrl = str_replace(
                ':id',
                $dProject->id,
                config('custom_routes.projects.create')
            );

            // sendNotificationUser(
            //     'Projet Terminé',
            //     $message,
            //     $configUrl,
            //     null,
            //     [$dProject->installer?->company->admin, $dProject->creator]
            // );
        } catch (\Exception $e) {
        }
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
