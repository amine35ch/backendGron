<?php

namespace App\Policies;

use App\Models\DProductPrice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DProductPricePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view articles');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProductPrice $dProductPrice): bool
    {
        return canAccessCatalog($dProductPrice->product, $user, 'view articles');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create articles');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DProductPrice $dProductPrice)
    {

        return canAccessCatalog($dProductPrice->product, $user, 'update articles');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProductPrice $dProductPrice)
    {
        return canAccessCatalog($dProductPrice->product, $user, 'delete articles');
    }
}
