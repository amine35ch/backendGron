<?php

namespace App\Services\PProjectResidenceServices;

use App\Models\PProjectResidence;

class PProjectResidenceService
{
    public function __construct(private PProjectResidence $pProjectResidence)
    {
    }

    public function create(array $data)
    {
        return $this->pProjectResidence::create($data);
    }

    public function edit(array $data, PProjectResidence $pProjectResidence)
    {
        return $pProjectResidence->update($data);
    }

    public function delete(PProjectResidence $pProjectResidence): void
    {
        $pProjectResidence->delete();
    }

    public function getById(int $id)
    {
        return $this->pProjectResidence::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pProjectResidence, $filters);
    }
}
