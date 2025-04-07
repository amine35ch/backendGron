<?php

namespace App\Services\PResourceServices;

use App\Models\PResource;

class PResourceService
{
    public function __construct(private PResource $pResource)
    {
    }

    public function create(array $data)
    {
        return $this->pResource::create($data);
    }

    public function edit(array $data, PResource $pResource)
    {
        return $pResource->update($data);
    }

    public function delete(PResource $pResource): void
    {
        $pResource->delete();
    }

    public function getById(int $id)
    {
        return $this->pResource::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pResource, ($filters));
    }
}
