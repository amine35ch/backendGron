<?php

namespace App\Services\DProjectDecisionServices;

use App\Models\DProjectDecision;

class DProjectDecisionService
{
    public function __construct(private DProjectDecision $dProjectDecision)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectDecision::create($data);
    }

    public function edit(array $data, DProjectDecision $dProjectDecision)
    {
        return $dProjectDecision->update($data);
    }

    public function delete(DProjectDecision $dProjectDecision): void
    {
        $dProjectDecision->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectDecision::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectDecision, $filters);
    }
}
