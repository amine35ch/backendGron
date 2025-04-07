<?php

namespace App\Services\DProjectReferenceServices;

use App\Models\DProjectReference;

class DProjectReferenceService
{
    public function __construct(private DProjectReference $dProjectReference)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectReference::create($data);
    }

    public function edit(array $data, DProjectReference $dProjectReference)
    {
        return $dProjectReference->update($data);
    }

    public function delete(DProjectReference $dProjectReference): void
    {
        $dProjectReference->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectReference::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectReference, $filters);
    }
}
