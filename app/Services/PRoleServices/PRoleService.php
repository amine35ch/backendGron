<?php

namespace App\Services\PRoleServices;

use App\Models\PRole;

class PRoleService
{
    public function __construct(private PRole $pRole)
    {
    }

    public function create(array $data)
    {
        return $this->pRole::create($data);
    }

    public function edit(array $data, PRole $pRole)
    {
        return $pRole->update($data);
    }

    public function delete(PRole $pRole): void
    {
        $pRole->delete();
    }

    public function getById(int $id)
    {
        return $this->pRole::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pRole, ($filters));
    }
}
