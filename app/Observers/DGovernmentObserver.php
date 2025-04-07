<?php

namespace App\Observers;

use App\Models\DGovernment;

class DGovernmentObserver
{
    /**
     * Handle the DGovernment "creating" event.
     */
    public function creating(DGovernment $dGovernment): void
    {
        $dGovernment->reference = getNextReference($dGovernment->profile);
        $dGovernment->code = generateRandomUniqueCode($dGovernment->name);
    }

    /**
     * Handle the DGovernment "created" event.
     */
    public function created(DGovernment $dGovernment): void
    {
    }

    /**
     * Handle the DGovernment "updated" event.
     */
    public function updated(DGovernment $dGovernment): void
    {
    }

    /**
     * Handle the DGovernment "deleted" event.
     */
    public function deleting(DGovernment $dGovernment): void
    {
    }

    /**
     * Handle the DGovernment "restored" event.
     */
    public function restored(DGovernment $dGovernment): void
    {
        //
    }

    /**
     * Handle the DGovernment "force deleted" event.
     */
    public function forceDeleted(DGovernment $dGovernment): void
    {
        //
    }
}
