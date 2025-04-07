<?php

namespace App\Observers;

use App\Models\DocuSign;

class DocuSignObserver
{
    /**
     * Handle the DocuSign "created" event.
     */
    public function created(DocuSign $docuSign): void
    {
        //
    }

    /**
     * Handle the DocuSign "updated" event.
     */
    public function updated(DocuSign $docuSign): void
    {
        // refresh cache
        cache()->forever('docusign', $docuSign);
    }

    /**
     * Handle the DocuSign "deleted" event.
     */
    public function deleted(DocuSign $docuSign): void
    {
        //
    }

    /**
     * Handle the DocuSign "restored" event.
     */
    public function restored(DocuSign $docuSign): void
    {
        //
    }

    /**
     * Handle the DocuSign "force deleted" event.
     */
    public function forceDeleted(DocuSign $docuSign): void
    {
        //
    }
}
