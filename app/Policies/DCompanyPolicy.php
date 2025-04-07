<?php

namespace App\Policies;

use App\Models\DCompany;
use App\Models\User;

class DCompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, $identifier): bool
    {
        return $user->can("view $identifier");
    }

    public function view(User $user, DCompany $dCompany, $identifier): bool
    {
        return canAccessCompany($user, "view $identifier", $dCompany);
    }

    public function create(User $user, $identifier): bool
    {
        return $user->can("create $identifier");
    }

    public function update(User $user, DCompany $dCompany, $identifier): bool
    {

        return canAccessCompany($user, "update $identifier", $dCompany);
    }

    public function delete(User $user, DCompany $dCompany, $identifier): bool
    {
        return canAccessCompany($user, "delete $identifier", $dCompany);
    }

    public function createUser(User $user, DCompany $dCompany): bool
    {
        return canAccessCompany($user, 'create collaborators', $dCompany);
    }

    public function viewUser(User $user, DCompany $dCompany): bool
    {
        return canAccessCompany($user, 'view collaborators', $dCompany);
    }

    public function updateUser(User $user, DCompany $dCompany): bool
    {
        return canAccessCompany($user, 'update collaborators', $dCompany);
    }

    public function restore(User $user, DCompany $dCompany)
    {
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DCompany $dCompany)
    {
    }

    public function attachDocument(User $user)
    {
        return $user->can('attach-any-document');
    }
}
