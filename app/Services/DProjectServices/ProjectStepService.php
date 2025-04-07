<?php

namespace App\Services\DProjectServices;

use App\Enums\PStepEnum\PStepOrder;
use App\Exceptions\CustomException;
use App\Factories\StepsFactory\StepsFactory;
use App\Models\DProject;
use App\Models\PStep;
use Illuminate\Support\Facades\DB;

class ProjectStepService
{
    public function __construct(
        public DProject $dProject,
    ) {}

    public function generateNextStep($dProject)
    {

        try {
            DB::beginTransaction();

            if (!$dProject->step) {
                throw new CustomException('Etape non trouvé.');
            }

            if ($dProject->current_step_order >= 17) {
                throw new CustomException('Vous ne pouvez pas passer à l\'étape suivante dans ce moment.');
            }

            // if ($dProject->process_ended) {
            //     throw new CustomException('Le projet est terminé.');
            // }

            $this->startProcess($dProject);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    // public function forwardStep($dProject)
    // {

    //     try {
    //         DB::beginTransaction();

    //         if (!$dProject->step) {
    //             throw new CustomException('Etape non trouvé.');
    //         }

    //         if ($dProject->current_step_order >= 10) {
    //             throw new CustomException('Vous ne pouvez pas passer à l\'étape suivante dans ce moment.');
    //         }
    //         if (!$dProject->installer_company) {
    //             throw new CustomException('Vous ne pouvez pas passer à l\'étape suivante dans ce moment.');
    //         }
    //         // if ($dProject->process_ended) {
    //         //     throw new CustomException('Le projet est terminé.');
    //         // }

    //         $order=$dProject->cleared_step_order;
    //         $requirements=$order == PStepOrder::StepSimulator->value ? true: false;
    //         while ($order < PStepOrder::StepValidationDocumentsBeforeVisit->value) {
    //             $this->startProcess($dProject,$requirements);
    //             $dProject->refresh();
    //             $requirements=false;
    //             $order=$order+1;
    //         }
    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         throw new CustomException($e->getMessage());
    //     }
    // }

    public function initDocumentForInstaller($dProject)
    {
        $pSteps = PStep::where('order', '>=', $dProject->cleared_step_order)->where('order', '<=', PStepOrder::StepAppointmentMarAndTech->value)->select('reference', 'order')->get();
        foreach ($pSteps as $pStep) {
            $className = ucfirst($pStep->reference);
            $stepReference = "App\Factories\StepsFactory\Steps\\$className";
            $dProject->current_step_order = $pStep->order;
            $step = new $stepReference($dProject);
            $step->init();
            if ($pStep->order == PStepOrder::StepOfferPriceAndContract->value) {
                $step->createCerfa();
            }
            if ($pStep->order == PStepOrder::StepSimulator->value) {
                $step->createInvoiceHeader();
            }
        }
    }

    public function initFinishVisitDocs($dProject)
    {
        $pStep = PStep::where('order', PStepOrder::StepFillShuttleCard->value)->first();
        $className = ucfirst($pStep->reference);
        $stepReference = "App\Factories\StepsFactory\Steps\\$className";
        $dProject->current_step_order = $pStep->order;
        $step = new $stepReference($dProject);
        $step->init();
    }

    public function startProcess($dProject)
    {
        $stepFactory = new StepsFactory($dProject);
        $stepFactory->requirements();
        $stepFactory->nextStepAction();
        if ($dProject->process_ended && $dProject->current_step_order == 16) {
            $dProject->save();

            return false;
        }
        $stepFactory->nextStep();
        $stepFactory->updateStep($dProject);
        $stepFactory->init();
        if ($dProject->current_step_order > $dProject->cleared_step_order) {
            $dProject->cleared_step_order = $dProject->current_step_order;
        }
        $dProject->save();
    }
}
