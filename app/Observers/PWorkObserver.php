<?php

namespace App\Observers;

use App\Models\PWork;

class PWorkObserver
{
    /**
     * Handle the PWork "creating" event.
     */
    public function creating(PWork $work): void
    {
        $work->d_company_id = getMarConnectedUser();
    }

    /**
     * Handle the PWork "created" event.
     */
    public function created(PWork $work): void
    {
    }

    /**
     * Handle the PWork "updated" event.
     */
    public function updated(PWork $work): void
    {
    }

    /**
     * Handle the PWork "deleted" event.
     */
    public function deleting(PWork $work): void
    {
    }

    /**
     * Handle the PWork "restored" event.
     */
    public function restored(PWork $work): void
    {
        //
    }

    /**
     * Handle the PWork "force deleted" event.
     */
    public function forceDeleted(PWork $work): void
    {
        //
    }
}
