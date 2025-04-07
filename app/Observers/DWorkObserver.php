<?php

namespace App\Observers;

use App\Enums\RoleEnum\RoleEnum;
use App\Exceptions\CustomException;
use App\Models\DWork;

class DWorkObserver
{
    /**
     * Handle the DWork "creating" event.
     */
    public function creating(DWork $DWork): void
    {
        $DWork->d_company_id = getCompanyOfConnectedUser()->id;
        if (auth()->user()->hasRole(RoleEnum::MARADM->value)) {
            $DWork->mar_id = getCompanyOfConnectedUser()->id;
            $DWork->access = 1;
        }
    }

    /**
     * Handle the DWork "created" event.
     */
    public function created(DWork $DWork): void
    {
    }

    /**
     * Handle the DWork "updated" event.
     */
    public function updated(DWork $DWork): void
    {
        $user = auth()->user();
        if (!$user->hasRole(RoleEnum::MARADM->value)) {
            $DWork->access = -1;
            $DWork->mar_id = null;
            $DWork->save();
        }
    }

    /**
     * Handle the DWork "deleted" event.
     */
    public function deleting(DWork $DWork): void
    {
        if (!$DWork->works->isEmpty()) {
            throw new CustomException('Suppression impossible.');
        }
    }

    /**
     * Handle the DWork "restored" event.
     */
    public function restored(DWork $DWork): void
    {
    }

    /**
     * Handle the DWork "force deleted" event.
     */
    public function forceDeleted(DWork $DWork): void
    {
    }
}