<?php

namespace App\Observers;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Models\DBrand;

class DBrandObserver
{
    /**
     * Handle the DBrand "creating" event.
     */
    public function creating(DBrand $DBrand): void
    {
    }

    /**
     * Handle the DBrand "created" event.
     */
    public function created(DBrand $DBrand): void
    {
    }

    /**
     * Handle the DBrand "updated" event.
     */
    public function updated(DBrand $DBrand): void
    {
    }

    /**
     * Handle the DBrand "deleted" event.
     */
    public function deleting(DBrand $DBrand): void
    {
    }

    /**
     * Handle the DBrand "restored" event.
     */
    public function restored(DBrand $DBrand): void
    {
    }

    /**
     * Handle the DBrand "force deleted" event.
     */
    public function forceDeleted(DBrand $DBrand): void
    {
    }
}