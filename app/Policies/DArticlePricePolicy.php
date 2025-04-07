<?php

namespace App\Policies;

use App\Models\DArticlePrice;
use App\Models\User;

class DArticlePricePolicy
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
    public function view(User $user, DArticlePrice $dArticle): bool
    {
        return canAccessCatalog($dArticle->article, $user, 'view articles');
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
    public function update(User $user, DArticlePrice $dArticle)
    {

        return canAccessCatalog($dArticle->article, $user, 'update articles');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DArticlePrice $dArticle)
    {
        return canAccessCatalog($dArticle->article, $user, 'delete articles');
    }
}
