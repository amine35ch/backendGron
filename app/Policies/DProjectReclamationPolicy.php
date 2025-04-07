<?php

namespace App\Policies;

use App\Models\DProjectReclamation;
use App\Models\User;

class DProjectReclamationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProjectReclamation $dProjectReclamation): bool
    {
        //
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
    public function update(User $user, DProjectReclamation $dProjectReclamation): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProjectReclamation $dProjectReclamation): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProjectReclamation $dProjectReclamation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProjectReclamation $dProjectReclamation): bool
    {
        //
    }
}
