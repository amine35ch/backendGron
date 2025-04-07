<?php

namespace App\Services\PTypeDemandeProjectServices;

use App\Models\PTypeDemandeProject;

class PTypeDemandeProjectService
{
    public function __construct(private PTypeDemandeProject $pTypeDemandeProject)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeDemandeProject::create($data);
    }

    public function edit(array $data, PTypeDemandeProject $pTypeDemandeProject)
    {
        return $pTypeDemandeProject->update($data);
    }

    public function delete(PTypeDemandeProject $pTypeDemandeProject): void
    {
        $pTypeDemandeProject->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeDemandeProject::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeDemandeProject, $filters);
    }
}
