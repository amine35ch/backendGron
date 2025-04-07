<?php

namespace App\Services\PRaisonTypesServices;

use App\Models\PRaisonTypes;

class PRaisonTypesService
{
    public function __construct(private PRaisonTypes $PRaisonTypes)
    {
    }

    public function create(array $data)
    {
        return $this->PRaisonTypes::create($data);
    }

    public function edit(array $data, PRaisonTypes $PRaisonTypes)
    {
        return $PRaisonTypes->update($data);
    }

    public function delete(PRaisonTypes $PRaisonTypes): void
    {
        $PRaisonTypes->delete();
    }

    public function getById(int $id)
    {
        return $this->PRaisonTypes::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->PRaisonTypes, $filters);
    }
}
