<?php

namespace App\Services\DProjectOperationServices;

use App\Models\DProjectOperation;

class DProjectOperationService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return DProjectOperation::create($data);
    }

    public function edit(array $data, DProjectOperation $dProjectOperation)
    {
        return $dProjectOperation->update($data);
    }

    public function delete(DProjectOperation $dProjectOperation): void
    {
        $dProjectOperation->delete();
    }

    public function getById(int $id)
    {
        return DProjectOperation::find($id);
    }

    public function getAll($filters)
    {
        return collection(new DProjectOperation(), $filters);
    }
}
