<?php

namespace App\Services\PPhaseServices;

use App\Models\PPhase;

class PPhaseService
{
    public function __construct(private PPhase $pPhase)
    {
    }

    public function create(array $data)
    {
        return $this->pPhase::create($data);
    }

    public function edit(array $data, PPhase $pPhase)
    {
        return $pPhase->update($data);
    }

    public function delete(PPhase $pPhase): void
    {
        $pPhase->delete();
    }

    public function getById(int $id)
    {
        return $this->pPhase::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pPhase, $filters);
    }
}
