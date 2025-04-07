<?php

namespace App\Policies;

use App\Models\DGeneralNotification;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DGeneralNotificationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DGeneralNotification $dGeneralNotification): bool
    {
        return canViewGeneralNotification($user,$dGeneralNotification);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DGeneralNotification $dGeneralNotification): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DGeneralNotification $dGeneralNotification): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DGeneralNotification $dGeneralNotification): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DGeneralNotification $dGeneralNotification): bool
    {
        //
    }
}
