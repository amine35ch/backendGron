<?php

namespace App\Policies;

use App\Models\DProduct;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view articles');
    }

    public function viewAnyService(User $user): bool
    {
        return $user->can('view mar_services');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DProduct $dProduct): bool
    {
        return checkArticle($dProduct, $user, 'view');
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
    public function update(User $user, DProduct $dArticle)
    {
        return checkArticle($dArticle, $user, 'update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DProduct $dArticle)
    {
        return checkArticle($dArticle, $user, 'delete');
    }

    public function validate(User $user, DProduct $dArticle)
    {
        return checkArticle($dArticle, $user, 'validate');
    }

    public function updateAccess(User $user, DProduct $dArticle)
    {
        return checkArticle($dArticle, $user, 'update access articles');
    }

}
