<?php

namespace App\Policies;

use App\Models\DAdmin;
use App\Models\DModelReference;

class DModelReferencePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view settings');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DModelReference $modelRef): bool
    {
        return $user->can('view settings');
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
    public function update(User $user, DModelReference $modelRef): bool
    {
        return $user->can('update settings');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DModelReference $modelRef): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(DAdmin $dAdmin, DModelReference $dModelReference): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(DAdmin $dAdmin, DModelReference $dModelReference): bool
    {
        //
    }
}
