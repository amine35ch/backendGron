<?php

namespace App\Services\PStateServices;

use App\Models\PState;

class PStateService
{
    public function __construct(private PState $pState)
    {
    }

    public function create(array $data)
    {
        return $this->pState::create($data);
    }

    public function edit(array $data, PState $pState)
    {
        return $pState->update($data);
    }

    public function delete(PState $pState): void
    {
        $pState->delete();
    }

    public function getById(int $id)
    {
        return $this->pState::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pState, $filters);
    }
}
