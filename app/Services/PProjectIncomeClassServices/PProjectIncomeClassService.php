<?php

namespace App\Services\PProjectIncomeClassServices;

use App\Models\PProjectIncomeClass;

class PProjectIncomeClassService
{
    public function __construct(private PProjectIncomeClass $pProjectIncomeClass)
    {
    }

    public function create(array $data)
    {
        return $this->pProjectIncomeClass::create($data);
    }

    public function edit(array $data, PProjectIncomeClass $pProjectIncomeClass)
    {
        return $pProjectIncomeClass->update($data);
    }

    public function delete(PProjectIncomeClass $pProjectIncomeClass): void
    {
        $pProjectIncomeClass->delete();
    }

    public function getById(int $id)
    {
        return $this->pProjectIncomeClass::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pProjectIncomeClass, $filters);
    }
}
