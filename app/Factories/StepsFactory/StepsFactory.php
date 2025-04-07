<?php

namespace App\Factories\StepsFactory;

class StepsFactory
{
    public $step;

    public $dProject;

    public function __construct(&$dProject)
    {
        $stepReference = $dProject->step->reference;

        $className = ucfirst($stepReference);
        $stepReference = "App\Factories\StepsFactory\Steps\\$className";
        $this->step = new $stepReference($dProject);
        $this->dProject = $dProject;
    }

    public function init()
    {
        // try {
        //     notifyUsers(
        //         'logs.step.start.action',
        //         "test",
        //         [$this->dProject->client],
        //         $configUrl,
        //         true

        //     );
        // } catch (Exception $e) {
        // }

        return $this->step->init();
    }

    public function requirements()
    {
        return $this->step->requirements();
    }

    public function nextStepAction()
    {
        return $this->step->nextStepAction();
    }

    public function nextStep()
    {
        // try {
        //     notifyUsers(
        //         'logs.step.end.action',
        //         "test",
        //         [$this->dProject->client],
        //         $configUrl,
        //         true

        //     );
        // } catch (Exception $e) {
        // }

        return $this->step->nextStep();
    }

    public function previousStepAction()
    {
        $message = __(
            'logs.return_step.description',
            ['step' => $this->step->step->display_name]
        );

        setProjectHistory(
            $this->dProject,
            __(
                'logs.step.return_step.action',
                ['step' => $this->step->step->display_name]
            ),
            $message
        );
        setLog($message . $this->dProject->reference);

        // try {
        //     notifyUsers(
        //         'logs.step.return_step.action',
        //         "test",
        //         [$this->dProject->client],
        //         $configUrl,
        //         true

        //     );
        // } catch (Exception $e) {
        // }

        return $this->step->previousStepAction();
    }

    public function previousStep()
    {
        return $this->step->previousStep();
    }

    public function getStep()
    {
        return $this->step;
    }

    public function getStepName()
    {
        return $this->step->stepName;
    }

    public function updateStep(&$dProject)
    {
        $className = ucfirst($dProject->step()->first()?->reference);
        $stepReference = "App\Factories\StepsFactory\Steps\\$className";
        $this->step = new $stepReference($dProject);

        $message = __(
            'logs.step.update.description',
            ['step' => $this->step->step->display_name]
        );

        setProjectHistory(
            $this->dProject,
            __(
                'logs.step.update.action',
                ['step' => $this->step->step->display_name]
            ),
            $message
        );

        // try {
        //     notifyUsers(
        //         'logs.step.update.action',
        //         "test",
        //         [$this->dProject->client],
        //         $configUrl,
        //         true

        //     );
        // } catch (Exception $e) {
        // }

        setLog($message . $this->dProject->reference);
    }
}
