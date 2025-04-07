<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DProjectVisitEnum\DProjectVisitState;
use App\Enums\POperationEnum\POperationType;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Exceptions\CustomException;
use App\Models\DCompany;
use App\Models\DNotification;
use App\Models\DProjectOperation;
use App\Models\POperation;
use App\Models\PStep;
use App\Models\DProject;
use Illuminate\Support\Facades\Log;

class StepAppointmentMarAndTech
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

    public function stepAction() {}

    public function requirements()
    {
        $operation = $this->dProject->operations->where(
            'type',
            POperationType::AUDIT->value
        )->count();
        $visit = $this->dProject->visits->where(
            'type',
            PTypeVisitEnum::VISIT_MAR->value
        )->count();
        if (
            !$operation || !$visit
        ) {
            throw new CustomException('Veuillez planifier la visite');
        }

        // $this->dProject->visits->each(function ($visit) {

        //     if (!$visit->user_id) {
        //         throw new CustomException('Veuillez affecter le technicien pour la visite ' . $visit->name);
        //     }
        // });
    }

    public function nextStepAction()
    {
        if (!$this->dProject->contractReference) {
            do {
                $newReference = getNextContractReference('contract');
            } while ($this->isContractReferenceTaken($newReference));

            $this->dProject->contractReference = $newReference;
        }

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
        $visits = $this->dProject->visits;
        foreach ($visits as $visit) {
            if ($visit->state == DProjectVisitState::PLANNED->value || $visit->type == PTypeVisitEnum::VISIT_INSTALLER->value) {
                $dCompany = DCompany::find($visit->d_company_id);
                if ($visit->type == PTypeVisitEnum::VISIT_INSTALLER->value) {
                    try {
                        $message = __(
                            'notifications.project.visit.mar',
                            [
                                'reference' => $this->dProject->reference,
                            ]
                        );
                        $configUrl = str_replace(
                            ':id',
                            $this->dProject->id,
                            config('custom_routes.projects.create')
                        );
                        $dNotification = DNotification::withoutGlobalScopes()->where('description', $message)->where('endpoint', $configUrl)->latest()->first();
                        $time = $dNotification->created_at->add('1 hour');
                        if ($time < now()) {
                            sendNotificationCompany(
                                'Date visite MAR',
                                $message,
                                $configUrl,
                                $dCompany,
                                $dCompany->representative_last_name . ' ' . $dCompany->representative_first_name ?? null,
                            );
                        }
                    } catch (\Exception $e) {
                    }
                }

                if ($visit->type == PTypeVisitEnum::REL_AUDIT->value) {
                    try {
                        $message = __(
                            'notifications.project.visit.fix_audit',
                            [
                                'reference' => $this->dProject->reference,
                            ]
                        );
                        $configUrl = str_replace(
                            ':id',
                            $this->dProject->id,
                            config('custom_routes.projects.create')
                        );
                        $dNotification = DNotification::withoutGlobalScopes()->where('description', $message)->where('endpoint', $configUrl)->latest()->first();
                        $time = $dNotification->created_at->add('1 hour');
                        if ($time < now()) {
                            sendNotificationCompany(
                                'Enregistrement d\'une date visite Audit',
                                $message,
                                $configUrl,
                                $dCompany,
                                $dCompany->representative_last_name . ' ' . $dCompany->representative_first_name ?? null,
                            );
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
        }
    }
    public function isContractReferenceTaken($reference)
    {
        return DProject::where('contractReference', $reference)->exists();
    }
    public function nextStep()
    {
        $this->dProject->current_step_order = $this->step->next_step_order;
    }

    public function previousStepAction() {}

    public function previousStep() {}

    public function createAudit()
    {
        $operation = POperation::audit()->first();
        $visitAudit = $this->dProject->visit_audit;
        DProjectOperation::create([
            'd_project_id' => $this->dProject->id,
            'p_operation_id' => $operation?->id,
            'start_date' => $visitAudit->visit_date,
            'planned_start_date' => $visitAudit->visit_date,
            'd_company_id' => $visitAudit->d_company_id,
        ]);
    }
}
