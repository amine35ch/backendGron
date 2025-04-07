<?php

namespace App\Services\DProjectReclamationServices;

use App\Models\DProjectReclamation;
use App\Models\DProjectReclamationWork;

class DProjectReclamationService
{
    public function __construct(private DProjectReclamation $dProjectReclamation)
    {
    }

    public function create(array $data)
    {
        $reclamation = $this->dProjectReclamation::create($data);
        $recId = $reclamation->id;
        $workReclamations = [];
        foreach ($data['works'] as $work) {
            $work['d_project_reclamation_id'] = $recId;
            $workReclamations[] = $work;
        }
        DProjectReclamationWork::insert($workReclamations);

        return $reclamation;
    }

    public function edit(array $data, DProjectReclamation $dProjectReclamation)
    {
        return $dProjectReclamation->update($data);
    }

    public function delete(DProjectReclamation $dProjectReclamation): void
    {
        $dProjectReclamation->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectReclamation::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectReclamation, $filters);
    }
}
