<?php

namespace App\Services\PTypeCollaboratorServices;

use App\Models\PTypeCollaborator;

class PTypeCollaboratorService
{
    public function __construct(private PTypeCollaborator $pTypeCollaborator)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeCollaborator::create($data);
    }

    public function edit(array $data, PTypeCollaborator $pTypeCollaborator)
    {
        return $pTypeCollaborator->update($data);
    }

    public function delete(PTypeCollaborator $pTypeCollaborator): void
    {
        $pTypeCollaborator->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeCollaborator::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeCollaborator, $filters);
    }
}
