<?php

namespace App\Observers;

use App\Enums\DArticleEnum\DArticleState;
use App\Models\DProduct;

class DProductObserver
{
    /**
     * Handle the DProduct "creating" event.
     */
    public function creating(DProduct $dProduct): void
    {
        $dProduct->state = DArticleState::DEACTIVATE->value;
    }

    /**
     * Handle the DProduct "updated" event.
     */
    public function updated(DProduct $dProduct): void
    {
    }

    /**
     * Handle the DProduct "deleted" event.
     */
    public function deleted(DProduct $dProduct): void
    {
        //
    }

    /**
     * Handle the DProduct "restored" event.
     */
    public function restored(DProduct $dProduct): void
    {
        //
    }

    /**
     * Handle the DProduct "force deleted" event.
     */
    public function forceDeleted(DProduct $dProduct): void
    {
        //
    }
}