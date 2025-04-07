<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function createUser(User $user, string $role): bool
    {

        return checkPermissionForGlobalUsersWithRole($user, 'create', $role);
    }

    public function viewAny(User $user): bool
    {
        return checkPermissionForGlobalUsers($user, 'view');
    }

    public function viewUser(User $userConnected, User $user): bool
    {
        return checkPermissionForSpecificUser($userConnected, $user, 'view');
    }

    public function updateUser(User $userConnected, User $user): bool
    {
        return checkPermissionForSpecificUser($userConnected, $user, 'update');
    }

    public function disableUser(User $userConnected, User $user): bool
    {
        return checkPermissionForSpecificUser($userConnected, $user, 'disable');
    }

    public function deleteUser(User $userConnected, User $user): bool
    {
        return checkPermissionForSpecificUser($userConnected, $user, 'delete');
    }
}
