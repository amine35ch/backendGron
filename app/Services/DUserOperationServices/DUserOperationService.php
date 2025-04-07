<?php

namespace App\Services\DUserOperationServices;

use App\Models\DUserOperation;

class DUserOperationService
{
    public function __construct(private DUserOperation $dUserOperation)
    {
    }

    public function create(array $data)
    {
        return $this->dUserOperation::create($data);
    }

    public function edit(array $data, DUserOperation $dUserOperation)
    {
        return $dUserOperation->update($data);
    }

    public function delete(DUserOperation $dUserOperation): void
    {
        $dUserOperation->delete();
    }

    public function getById(int $id)
    {
        return $this->dUserOperation::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dUserOperation, $filters);
    }
}
