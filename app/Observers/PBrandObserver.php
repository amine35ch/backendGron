<?php

namespace App\Observers;

use App\Models\PBrand;

class PBrandObserver
{
    /**
     * Handle the PBrand "creating" event.
     */
    public function creating(PBrand $PBrand): void
    {
        $PBrand->d_company_id = getMarConnectedUser();
    }

    /**
     * Handle the PBrand "created" event.
     */
    public function created(PBrand $PBrand): void
    {
    }

    /**
     * Handle the PBrand "updated" event.
     */
    public function updated(PBrand $PBrand): void
    {
    }

    /**
     * Handle the PBrand "deleted" event.
     */
    public function deleting(PBrand $PBrand): void
    {
    }

    /**
     * Handle the PBrand "restored" event.
     */
    public function restored(PBrand $PBrand): void
    {
        //
    }

    /**
     * Handle the PBrand "force deleted" event.
     */
    public function forceDeleted(PBrand $PBrand): void
    {
        //
    }
}
