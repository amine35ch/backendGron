<?php

namespace App\Observers;

use App\Models\PArticle;

class PArticleObserver
{
    /**
     * Handle the PArticle "creating" event.
     */
    public function creating(PArticle $pArticle): void
    {
        // $pArticle->d_company_id = getMarConnectedUser();
    }

    /**
     * Handle the PArticle "created" event.
     */
    public function created(PArticle $pArticle): void
    {
    }

    /**
     * Handle the PArticle "updated" event.
     */
    public function updated(PArticle $pArticle): void
    {
    }

    /**
     * Handle the PArticle "deleted" event.
     */
    public function deleting(PArticle $pArticle): void
    {
    }

    /**
     * Handle the PArticle "restored" event.
     */
    public function restored(PArticle $pArticle): void
    {
        //
    }

    /**
     * Handle the PArticle "force deleted" event.
     */
    public function forceDeleted(PArticle $pArticle): void
    {
        //
    }
}
