<?php

namespace App\Policies;

use App\Models\DClient;
use App\Models\User;

class DClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view clients');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DClient $dClient): bool
    {
        return canViewClient($user, $dClient, 'view clients');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create clients');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DClient $dClient): bool
    {
        return accessByCompany($user, $dClient, 'update clients');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DClient $dClient): bool
    {
        return accessByCompany($user, $dClient, 'delete clients');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DClient $dClient): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DClient $dClient): bool
    {
        return true;
    }

    public function attachDocument(User $user): bool
    {
        return $user->can('attach-any-document');
    }
}
