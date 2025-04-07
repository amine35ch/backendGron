<?php

namespace App\Policies;

use App\Models\DProjectVisit;
use App\Models\User;

class DProjectVisitPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view visits');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProjectVisit $dProjectVisit): bool
    {
        return canAccessFromCompany($dProjectVisit, $user, 'view visits');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create visits');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DProjectVisit $dProjectVisit): bool
    {
        return canAccessFromCompany($dProjectVisit, $user, 'update visits');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProjectVisit $dProjectVisit): bool
    {
        return canAccessFromCompany($dProjectVisit, $user, 'delete visits');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProjectVisit $dProjectVisit): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProjectVisit $dProjectVisit): bool
    {
        //
    }
}
