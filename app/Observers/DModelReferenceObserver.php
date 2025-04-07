<?php

namespace App\Observers;

use App\Models\DModelReference;

class DModelReferenceObserver
{
    /**
     * Handle the DModelReference "creating" event.
     */
    public function creating(DModelReference $reference): void
    {
        $reference->d_company_id = getMarConnectedUser();
    }

    /**
     * Handle the DModelReference "created" event.
     */
    public function created(DModelReference $reference): void
    {
    }

    /**
     * Handle the DModelReference "updated" event.
     */
    public function updated(DModelReference $reference): void
    {
    }

    /**
     * Handle the DModelReference "deleted" event.
     */
    public function deleting(DModelReference $reference): void
    {
    }

    /**
     * Handle the DModelReference "restored" event.
     */
    public function restored(DModelReference $reference): void
    {
        //
    }

    /**
     * Handle the DModelReference "force deleted" event.
     */
    public function forceDeleted(DModelReference $reference): void
    {
        //
    }
}
