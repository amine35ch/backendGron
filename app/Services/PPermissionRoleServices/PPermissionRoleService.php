<?php

namespace App\Services\PPermissionRoleServices;

use App\Models\PPermissionRole;

class PPermissionRoleService
{
    public function __construct(private PPermissionRole $pPermissionRole)
    {
    }

    public function create(array $data)
    {
        return $this->pPermissionRole::create($data);
    }

    public function edit(array $data, PPermissionRole $pPermissionRole)
    {
        return $pPermissionRole->update($data);
    }

    public function delete(PPermissionRole $pPermissionRole): void
    {
        $pPermissionRole->delete();
    }

    public function getById(int $id)
    {
        return $this->pPermissionRole::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pPermissionRole, ($filters));
    }
}
