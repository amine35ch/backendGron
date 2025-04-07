<?php

namespace App\Services\PStepServices;

use App\Models\PStep;

class PStepService
{
    public function __construct(private PStep $pStep)
    {
    }

    public function create(array $data)
    {
        return $this->pStep::create($data);
    }

    public function edit(array $data, PStep $pStep)
    {
        return $pStep->update($data);
    }

    public function delete(PStep $pStep): void
    {
        $pStep->delete();
    }

    public function getById(int $id)
    {
        return $this->pStep::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pStep, ($filters));
    }
}
