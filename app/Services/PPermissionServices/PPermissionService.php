<?php

namespace App\Services\PPermissionServices;

use App\Models\PPermission;
use App\Models\PResource;
use Spatie\Permission\Models\Permission;

class PPermissionService
{
    public function __construct(private PPermission $pPermission)
    {
    }

    public function create(array $data)
    {
        return $this->pPermission::create($data);
    }

    public function edit(array $data, PPermission $pPermission)
    {
        return $pPermission->update($data);
    }

    public function delete(PPermission $pPermission): void
    {
        $pPermission->delete();
    }

    public function getById(int $id)
    {
        return $this->pPermission::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pPermission, ($filters));
    }

    public function getPermissions($user)
    {
        return PResource::all()->map(function ($resource) use ($user) {
            $resourceTitle = $resource->local_fr;
            $authorized = false;
            $resourcePermissions = [];

            foreach ($resource->permissions as $permission) {
                $permissionName = $permission->entitled;
                $hasPermission = $user->can($permissionName);

                $resourcePermissions[] = [
                    'id' => $permission->permission_id,
                    'name' => $permissionName,
                    'authorized' => $hasPermission,
                ];

                if ($hasPermission || $user->hasRole('admin')) {
                    $authorized = true;
                }
            }

            return [
                'resource_name' => $resourceTitle,
                'authorized' => $authorized,
                'permissions' => $resourcePermissions,
            ];
        }) ?? [];
    }

    public function sync($data, $user)
    {
        foreach ($data['resources'] as $resourceData) {
            foreach ($resourceData['permissions'] as $permissionData) {
                $permission = Permission::find($permissionData['id']);
                if ($permission) {
                    $userHasPermission = $user->can($permission->name);
                    $authorized = $permissionData['authorized'];

                    if ($authorized && ! $userHasPermission) {
                        $user->givePermissionTo($permission->name);
                    } elseif (! $authorized && $userHasPermission) {
                        $user->revokePermissionTo($permission->name);
                    }
                }
            }
        }
    }
}
