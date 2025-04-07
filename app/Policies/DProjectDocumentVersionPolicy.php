<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DProjectDocumentVersion;

class DProjectDocumentVersionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProjectDocumentVersion $dProjectDocumentVersion): bool
    {
        $dProject = $dProjectDocumentVersion->document->project;
        return canAccessProject($dProject, $user, 'view projects');
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
    public function update(User $user, DProjectDocumentVersion $dProjectDocumentVersion): bool
    {
        $dProject = $dProjectDocumentVersion->document->project;
        $profile = $user->profile;
        return canAccessProject($dProject, $user, 'view projects') && $user->role == $profile . '::admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProjectDocumentVersion $dProjectDocumentVersion): bool
    {
        $dProject = $dProjectDocumentVersion->document->project;
        $profile = $user->profile;
        return canAccessProject($dProject, $user, 'view projects') && $user->role == $profile . '::admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DProjectDocumentVersion $dProjectDocumentVersion): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DProjectDocumentVersion $dProjectDocumentVersion): bool
    {
        //
    }
}
