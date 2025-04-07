<?php

namespace App\Policies;

use App\Models\DProjectEvent;
use App\Models\User;

class DProjectEventPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view events');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProjectEvent $dProjectEvent): bool
    {
        return canAccessFromCompany($dProjectEvent, $user, 'view events');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create events');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DProjectEvent $dProjectEvent): bool
    {
        return canAccessFromCompany($dProjectEvent, $user, 'update events');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProjectEvent $dProjectEvent): bool
    {
        return canAccessFromCompany($dProjectEvent, $user, 'delete events');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProjectEvent $dProjectEvent): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProjectEvent $dProjectEvent): bool
    {
        //
    }
}
