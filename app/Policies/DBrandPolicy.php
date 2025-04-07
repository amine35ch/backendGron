<?php

namespace App\Policies;

use App\Models\DBrand;
use App\Models\User;

class DBrandPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->can('view brands');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DBrand $dBrand)
    {
        return canAccessArticle($dBrand, $user, 'view brands');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->can('create brands');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DBrand $dBrand)
    {
        return canAccessArticle($dBrand, $user, 'update brands', 'lines');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DBrand $dBrand): bool
    {
        return canAccessArticle($dBrand, $user, 'delete brands', 'lines');
    }

    public function validate(User $user, DBrand $dBrand): bool
    {
        return canAccessArticle($dBrand, $user, 'validate brands', 'lines');
    }

    public function updateAccess(User $user, DBrand $dBrand)
    {
        return canAccessArticle($dBrand, $user, 'update access brands');
    }
}
