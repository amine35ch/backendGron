<?php

namespace App\Policies;

use App\Models\DLog;
use App\Models\User;

class DLogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view logs');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DLog $dLog): bool
    {
        return $user->can('view logs');
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
    public function update(User $user, DLog $dLog): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DLog $dLog): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DLog $dLog): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DLog $dLog): bool
    {
        //
    }
}
