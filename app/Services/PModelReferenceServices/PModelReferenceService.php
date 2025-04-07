<?php

namespace App\Services\PModelReferenceServices;

use App\Models\PModelReference;

class PModelReferenceService
{
    public function __construct(private PModelReference $pModelReference)
    {
    }

    public function create(array $data)
    {
        return $this->pModelReference::create($data);
    }

    public function edit(array $data, PModelReference $pModelReference)
    {
        return $pModelReference->update($data);
    }

    public function delete(PModelReference $pModelReference): void
    {
        $pModelReference->delete();
    }

    public function getById(int $id)
    {
        return $this->pModelReference::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pModelReference, ($filters));
    }
}
