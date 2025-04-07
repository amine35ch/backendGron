<?php

namespace App\Services\DGovernmentServices;

use App\Models\DGovernment;

class DGovernmentService
{
    public function __construct(private DGovernment $dGovernment)
    {
    }

    public function create(array $data)
    {
        return $this->dGovernment::create($data);
    }

    public function edit(array $data, DGovernment $dGovernment)
    {
        return $dGovernment->update($data);
    }

    public function delete(DGovernment $dGovernment): void
    {
        $dGovernment->delete();
    }

    public function getById(int $id)
    {
        return $this->dGovernment::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dGovernment, $filters);
    }
}
