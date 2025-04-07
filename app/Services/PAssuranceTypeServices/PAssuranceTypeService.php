<?php

namespace App\Services\PAssuranceTypeServices;

use App\Models\PAssuranceType;

class PAssuranceTypeService
{
    public function __construct(private PAssuranceType $pAssuranceType)
    {
    }

    public function create(array $data)
    {
        return $this->pAssuranceType::create($data);
    }

    public function edit(array $data, PAssuranceType $pAssuranceType)
    {
        return $pAssuranceType->update($data);
    }

    public function delete(PAssuranceType $pAssuranceType): void
    {
        $pAssuranceType->delete();
    }

    public function getById(int $id)
    {
        return $this->pAssuranceType::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pAssuranceType, $filters);
    }
}
