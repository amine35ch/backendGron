<?php

namespace App\Services\PStatusServices;

use App\Models\PStatus;

class PStatusService
{
    public function __construct(private PStatus $pStatus)
    {
    }

    public function create(array $data)
    {
        return $this->pStatus::create($data);
    }

    public function edit(array $data, PStatus $pStatus)
    {
        return $pStatus->update($data);
    }

    public function delete(PStatus $pStatus): void
    {
        $pStatus->delete();
    }

    public function getById(int $id)
    {
        return $this->pStatus::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pStatus, $filters);
    }
}
