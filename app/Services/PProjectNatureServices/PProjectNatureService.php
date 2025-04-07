<?php

namespace App\Services\PProjectNatureServices;

use App\Models\PProjectNature;

class PProjectNatureService
{
    public function __construct(private PProjectNature $pProjectNature)
    {
    }

    public function create(array $data)
    {
        return $this->pProjectNature::create($data);
    }

    public function edit(array $data, PProjectNature $pProjectNature)
    {
        return $pProjectNature->update($data);
    }

    public function delete(PProjectNature $pProjectNature): void
    {
        $pProjectNature->delete();
    }

    public function getById(int $id)
    {
        return $this->pProjectNature::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pProjectNature, $filters);
    }
}
