<?php

namespace App\Observers;

use App\Models\DCompanyDocumentVersion;
use Illuminate\Support\Facades\Storage;

class DCompanyDocumentVersionObserver
{
    /**
     * Handle the DCompanyDocumentVersion "creating" event.
     */
    public function creating(DCompanyDocumentVersion $version): void
    {
        $document = $version->document;
        $dCompany = $document->company;
        $dCompany->size_documents += Storage::disk('local')->size($version->path);
        $dCompany->save();
    }

    /**
     * Handle the DCompanyDocumentVersion "created" event.
     */
    public function created(DCompanyDocumentVersion $version): void
    {
    }

    /**
     * Handle the DCompanyDocumentVersion "updated" event.
     */
    public function updated(DCompanyDocumentVersion $version): void
    {
    }

    /**
     * Handle the DCompanyDocumentVersion "deleted" event.
     */
    public function deleting(DCompanyDocumentVersion $version): void
    {
        $document = $version->document;
        $dCompany = $document->company;
        $dCompany->size_documents -= Storage::disk('local')->size($version->path);
        $dCompany->save();
    }

    /**
     * Handle the DCompanyDocumentVersion "restored" event.
     */
    public function restored(DCompanyDocumentVersion $version): void
    {
        //
    }

    /**
     * Handle the DCompanyDocumentVersion "force deleted" event.
     */
    public function forceDeleted(DCompanyDocumentVersion $version): void
    {
        //
    }
}
