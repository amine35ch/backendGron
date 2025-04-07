<?php

namespace App\Services\PTypeVisitServices;

use App\Models\PTypeVisit;

class PTypeVisitService
{
    public function __construct(private PTypeVisit $pTypeVisit)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeVisit::create($data);
    }

    public function edit(array $data, PTypeVisit $pTypeVisit)
    {
        return $pTypeVisit->update($data);
    }

    public function delete(PTypeVisit $pTypeVisit): void
    {
        $pTypeVisit->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeVisit::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeVisit, $filters);
    }
}
