<?php

namespace App\Observers;

use App\Models\PSmtp;

class PSmtpObserver
{
    /**
     * Handle the PSmtp "creating" event.
     */
    public function creating(PSmtp $smtp): void
    {
        $smtp->d_company_id = getMarConnectedUser();
    }

    /**
     * Handle the PSmtp "created" event.
     */
    public function created(PSmtp $smtp): void
    {
    }

    /**
     * Handle the PSmtp "updated" event.
     */
    public function updated(PSmtp $smtp): void
    {
    }

    /**
     * Handle the PSmtp "deleted" event.
     */
    public function deleting(PSmtp $smtp): void
    {
    }

    /**
     * Handle the PSmtp "restored" event.
     */
    public function restored(PSmtp $smtp): void
    {
        //
    }

    /**
     * Handle the PSmtp "force deleted" event.
     */
    public function forceDeleted(PSmtp $smtp): void
    {
        //
    }
}
