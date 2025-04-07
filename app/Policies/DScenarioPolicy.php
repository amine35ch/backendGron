<?php

namespace App\Policies;

use App\Models\DAdmin;
use App\Models\DScenario;
use App\Models\User;

class DScenarioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->can('view scenarios');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DScenario $dScenario)
    {
        return $user->can('view scenarios');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->can('create scenarios');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DScenario $dScenario)
    {
        return canAccessCatalog($dScenario, $user, 'update scenarios');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DScenario $dScenario)
    {
        return canAccessCatalog($dScenario, $user, 'delete scenarios');
    }

    public function validate(User $user, DScenario $dScenario)
    {
        return $user->can('validate scenarios');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(DAdmin $dAdmin, DScenario $dScenario): bool
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(DAdmin $dAdmin, DScenario $dScenario): bool
    {
    }
}
