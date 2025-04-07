<?php

namespace App\Observers;

use App\Models\DProjectDocumentVersion;
use Illuminate\Support\Facades\Storage;

class DProjectDocumentVersionObserver
{
    /**
     * Handle the DProjectDocumentVersion "creating" event.
     */
    public function creating(DProjectDocumentVersion $version): void
    {
        $document = $version->document;
        $dCompany = $document->project->company;
        $dCompany->size_documents += Storage::disk('local')->size($version->path);
        $dCompany->save();
    }

    /**
     * Handle the DProjectDocumentVersion "created" event.
     */
    public function created(DProjectDocumentVersion $version): void
    {
    }

    /**
     * Handle the DProjectDocumentVersion "updated" event.
     */
    public function updated(DProjectDocumentVersion $version): void
    {
    }

    /**
     * Handle the DProjectDocumentVersion "deleted" event.
     */
    public function deleting(DProjectDocumentVersion $version): void
    {
        $document = $version->document;
        $dCompany = $document->project->company;
        $dCompany->size_documents -= Storage::disk('local')->size($version->path);
        $dCompany->save();
    }

    /**
     * Handle the DProjectDocumentVersion "restored" event.
     */
    public function restored(DProjectDocumentVersion $version): void
    {
        //
    }

    /**
     * Handle the DProjectDocumentVersion "force deleted" event.
     */
    public function forceDeleted(DProjectDocumentVersion $version): void
    {
        //
    }
}
