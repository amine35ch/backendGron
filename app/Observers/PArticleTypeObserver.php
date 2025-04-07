<?php

namespace App\Observers;

use App\Models\PArticleType;

class PArticleTypeObserver
{
    /**
     * Handle the PArticleType "creating" event.
     */
    public function creating(PArticleType $pArticleType): void
    {
        $pArticleType->d_company_id = getMarConnectedUser();
    }

    /**
     * Handle the PArticleType "created" event.
     */
    public function created(PArticleType $pArticleType): void
    {
    }

    /**
     * Handle the PArticleType "updated" event.
     */
    public function updated(PArticleType $pArticleType): void
    {
    }

    /**
     * Handle the PArticleType "deleted" event.
     */
    public function deleting(PArticleType $pArticleType): void
    {
    }

    /**
     * Handle the PArticleType "restored" event.
     */
    public function restored(PArticleType $pArticleType): void
    {
        //
    }

    /**
     * Handle the PArticleType "force deleted" event.
     */
    public function forceDeleted(PArticleType $pArticleType): void
    {
        //
    }
}
