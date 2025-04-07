<?php

namespace App\Observers;

use App\Models\DClientDocumentVersion;
use Illuminate\Support\Facades\Storage;

class DClientDocumentVersionObserver
{
    /**
     * Handle the DClientDocumentVersion "creating" event.
     */
    public function creating(DClientDocumentVersion $version): void
    {
        $document = $version->document;
        $dCompany = $document->client->company;
        $dCompany->size_documents += Storage::disk('local')->size($version->path);
        $dCompany->save();
    }

    /**
     * Handle the DClientDocumentVersion "created" event.
     */
    public function created(DClientDocumentVersion $version): void
    {
    }

    /**
     * Handle the DClientDocumentVersion "updated" event.
     */
    public function updated(DClientDocumentVersion $version): void
    {
    }

    /**
     * Handle the DClientDocumentVersion "deleted" event.
     */
    public function deleting(DClientDocumentVersion $version): void
    {
        $document = $version->document;
        $dCompany = $document->client->company;
        $dCompany->size_documents -= Storage::disk('local')->size($version->path);
        $dCompany->save();
    }

    /**
     * Handle the DClientDocumentVersion "restored" event.
     */
    public function restored(DClientDocumentVersion $version): void
    {
        //
    }

    /**
     * Handle the DClientDocumentVersion "force deleted" event.
     */
    public function forceDeleted(DClientDocumentVersion $version): void
    {
        //
    }
}
