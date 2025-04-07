<?php

namespace App\Policies;

use App\Models\POperation;
use App\Models\User;

class POperationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->can('view operations');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, POperation $POperation): bool
    {
        return $user->can('view operations');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, POperation $POperation)
    {
        return $user->can('update operations');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, POperation $POperation)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, POperation $POperation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, POperation $POperation)
    {
        //
    }
}
