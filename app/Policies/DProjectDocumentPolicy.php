<?php

namespace App\Policies;

use App\Models\DProjectDocument;
use App\Models\User;

class DProjectDocumentPolicy
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
    public function view(User $user, DProjectDocument $dProjectDocument): bool
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
    public function update(User $user, DProjectDocument $dProjectDocument): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProjectDocument $dProjectDocument): bool
    {
        return canDeleteDocument($user,$dProjectDocument);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProjectDocument $dProjectDocument): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProjectDocument $dProjectDocument): bool
    {
        //
    }
}
