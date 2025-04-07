<?php

namespace App\Services\RootServices;

use App\Models\Root;

class RootService
{
    public function __construct(private Root $root)
    {
    }

    public function create(array $data)
    {
        return $this->root::create($data);
    }

    public function edit(array $data, Root $root)
    {
        return $root->update($data);
    }

    public function delete(Root $root): void
    {
        $root->delete();
    }

    public function getById(int $id)
    {
        return $this->root::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->root, $filters);
    }
}
