<?php

namespace App\Policies;

use App\Models\PSmtp;

class PSmtpPolicy
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
    public function view(User $user, PSmtp $pSmtp): bool
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
    public function update(User $user, PSmtp $pSmtp): bool
    {
        return $user->can('update settings');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PSmtp $pSmtp): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PSmtp $pSmtp): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PSmtp $pSmtp): bool
    {
        //
    }
}
