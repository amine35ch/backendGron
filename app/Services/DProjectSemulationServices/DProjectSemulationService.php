<?php

namespace App\Services\DProjectSemulationServices;

use App\Models\DProjectSemulation;
use App\Services\DProjectServices\DProjectService;

class DProjectSemulationService
{
    public function __construct(private DProjectSemulation $dProjectSemulation)
    {
    }

    public function create(array $data)
    {
        $simulation = $this->dProjectSemulation::create($data);
        // $dProjectService = app(DProjectService::class);
        // $dProjectService->edit($data, $simulation->project);
    }

    public function edit(array $data, DProjectSemulation $dProjectSemulation)
    {
        return $dProjectSemulation->update($data);
    }

    public function delete(DProjectSemulation $dProjectSemulation): void
    {
        $dProjectSemulation->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectSemulation::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectSemulation, ($filters));
    }
}
