<?php

namespace App\Observers;

use App\Enums\PStateEnum\PStateEnum;
use App\Models\PScenario;

class PScenarioObserver
{
    /**
     * Handle the PScenario "creating" event.
     */
    public function creating(PScenario $scenario): void
    {
        $scenario->d_company_id = getMarConnectedUser();
        $scenario->state = PStateEnum::ACTIVATED->value;
    }

    /**
     * Handle the PScenario "created" event.
     */
    public function created(PScenario $scenario): void
    {
    }

    /**
     * Handle the PScenario "updated" event.
     */
    public function updated(PScenario $scenario): void
    {
    }

    /**
     * Handle the PScenario "deleted" event.
     */
    public function deleting(PScenario $scenario): void
    {
    }

    /**
     * Handle the PScenario "restored" event.
     */
    public function restored(PScenario $scenario): void
    {
        //
    }

    /**
     * Handle the PScenario "force deleted" event.
     */
    public function forceDeleted(PScenario $scenario): void
    {
        //
    }
}
