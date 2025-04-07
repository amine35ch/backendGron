<?php

namespace App\Services\PProjectEnergyClassServices;

use App\Models\PProjectEnergyClass;

class PProjectEnergyClassService
{
    public function __construct(private PProjectEnergyClass $pProjectEnergyClass)
    {
    }

    public function create(array $data)
    {
        return $this->pProjectEnergyClass::create($data);
    }

    public function edit(array $data, PProjectEnergyClass $pProjectEnergyClass)
    {
        return $pProjectEnergyClass->update($data);
    }

    public function delete(PProjectEnergyClass $pProjectEnergyClass): void
    {
        $pProjectEnergyClass->delete();
    }

    public function getById(int $id)
    {
        return $this->pProjectEnergyClass::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pProjectEnergyClass, $filters);
    }
}
