<?php

namespace App\Factories\StepsFactory\Steps;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectOperationEnum\DProjectOperationState;
use App\Enums\DProjectVisitEnum\DProjectVisitState;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Exceptions\CustomException;
use App\Models\DProjectDecision;
use App\Models\PStep;
use App\Models\PStepDocument;

class StepFillShuttleCard
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
        // $this->dProject->status = $this->step->state_init;

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
        $states=$this->dProject->visits()->whereIn('type',[PTypeVisitEnum::VISIT_MAR->value,PTypeVisitEnum::VISIT_INSTALLER->value])->select('state')->get();
     
        $allVisitsFinished = $states->every(function($value) {

            return $value->state === DProjectVisitState::FINISHED->value;
        });
        if (!$allVisitsFinished) {
            throw new CustomException(__('exceptions.visits'));
        }
    }

    public function nextStepAction()
    {
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

        $audit_operation = $this->dProject->operations->where('p_operation_id', 2)->first();
        if ($audit_operation->state !== DProjectOperationState::FINISHED->value) {
            $documentTypeToFinishAuditOperation = ['3', '6'];
            $documents = $this->dProject->documents->whereIn('type_doc', $documentTypeToFinishAuditOperation);
            $flag = true;

            foreach ($documents as $document) {
                if ($document->status !== 4) {
                    $flag = false;
                    break;
                }
            }
            if ($flag) {
                $audit_operation->update([
                    'state' => DProjectOperationState::FINISHED->value,
                ]);
            }
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
        //         $mandataireAdmin=$this->dProject->mandataire_admin_company;
        //         $mandataireFin=$this->dProject->mandataire_fina_company;
        //         if ($mandataireAdmin->profile == DCompanyProfile::MAN->value) {
        //             sendNotificationCompany(
        //                 $subject,
        //                 $message,
        //                 $configUrl,
        //                 $mandataireAdmin,
        //             );
        //         }
        //         if ($mandataireFin->profile == DCompanyProfile::MAN->value && $mandataireFin->id !==  $mandataireAdmin->id ) {
        //             sendNotificationCompany(
        //                 $subject,
        //                 $message,
        //                 $configUrl,
        //                 $mandataireFin,
        //             );
        //         }

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
        return DProjectDecision::where('condition', 'generate_shuttle_card')
            ->where('d_project_id', $this->dProject->id)
            ->first();
    }
}
