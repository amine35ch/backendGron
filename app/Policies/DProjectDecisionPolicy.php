<?php

namespace App\Policies;

use App\Models\DProjectDecision;

class DProjectDecisionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view projects');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProjectDecision $dProjectDecision): bool
    {
        return $user->can('view projects');
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
    public function update(User $user, DProjectDecision $dProjectDecision): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProjectDecision $dProjectDecision): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProjectDecision $dProjectDecision): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProjectDecision $dProjectDecision): bool
    {
        //
    }
}
