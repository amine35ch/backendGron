<?php

namespace App\Observers;

use App\Enums\RoleEnum\RoleEnum;
use App\Models\DScenario;

class DScenarioObserver
{
    /**
     * Handle the DScenario "creating" event.
     */
    public function creating(DScenario $DScenario): void
    {
        $DScenario->d_company_id = getCompanyOfConnectedUser()->id;
        if (auth()->user()->hasRole(RoleEnum::MARADM->value)) {
            $DScenario->mar_id = getCompanyOfConnectedUser()->id;
            $DScenario->access = 1;
        }
    }

    /**
     * Handle the DScenario "created" event.
     */
    public function created(DScenario $DScenario): void
    {
        try {
            $action = 'create';
            $logMessage = __(
                "logs.scenario.$action.description",
                [
                    'username' => auth()->user()->username,
                    'reference' => $DScenario->entitled,
                ]
            );
            setLog($logMessage.$DScenario->entitled);
            // $configUrl = str_replace(
            //     ':id',
            //     $DScenario->id,
            //     config("custom_routes.scenarios.$action")
            // );
            // $message = __(
            //     'notifications.scenario.create',
            //     [
            //         'username' => auth()->user()->company?->trade_name,
            //     ]
            // );
            // sendNotificationUser(
            //     'Ajouter un nouveau scénario',
            //     $message,
            //     $configUrl,
            //     auth()->user()->company->admins
            // );
        } catch (\Exception $e) {
        }
    }

    /**
     * Handle the DScenario "updated" event.
     */
    public function updated(DScenario $DScenario): void
    {
        $user = auth()->user();
        if (!$user->hasRole(RoleEnum::MARADM->value)) {
            $DScenario->access = -1;
            $DScenario->mar_id = null;
            $DScenario->save();
        }
    }

    /**
     * Handle the DScenario "deleted" event.
     */
    public function deleting(DScenario $DScenario): void
    {
    }

    /**
     * Handle the DScenario "restored" event.
     */
    public function restored(DScenario $DScenario): void
    {
    }

    /**
     * Handle the DScenario "force deleted" event.
     */
    public function forceDeleted(DScenario $DScenario): void
    {
    }
}
