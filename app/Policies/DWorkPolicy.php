<?php

namespace App\Policies;

use App\Models\DAdmin;
use App\Models\DWork;
use App\Models\User;

class DWorkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->can('view works');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DWork $dWork)
    {
        return $user->can('view works');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->can('create works');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DWork $dWork)
    {
        return canAccessCatalog($dWork, $user, 'update works');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DWork $dWork)
    {
        return canAccessCatalog($dWork, $user, 'delete works');
    }

    public function validate(User $user, DWork $dWork)
    {
        return $user->can('validate works');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(DAdmin $dAdmin, DWork $dWork)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(DAdmin $dAdmin, DWork $dWork)
    {
    }
}
