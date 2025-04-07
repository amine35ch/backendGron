<?php

namespace App\Policies;

use App\Models\PArticle;
use App\Models\User;

class PArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view default-articles');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PArticle $pArticle): bool
    {
        return $user->can('view default-articles');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create default-articles');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PArticle $pArticle): bool
    {
        return $user->can('update default-articles');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PArticle $pArticle): bool
    {
        return $user->can('delete default-articles');
    }

    /**
     * Determine whether the user can restore the model.
     */
}
