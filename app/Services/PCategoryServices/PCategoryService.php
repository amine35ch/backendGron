<?php

namespace App\Services\PCategoryServices;

use App\Models\PCategory;

use Illuminate\Database\Eloquent\Collection;

class PCategoryService
{
    public function __construct(private PCategory $pCategory)
    {
    }

    public function create(array $data)
    {
        return $this->pCategory::create($data);
    }

    public function edit(array $data, PCategory $pCategory)
    {
        return  $pCategory->update($data);
    }

    public function delete(PCategory $pCategory): void
    {
        $pCategory->delete();
    }

    public function getById(int $id)
    {
        return $this->pCategory::find($id);
    }

    public function getAll($filters)
    {
        return $this->pCategory::filter($filters)->get();
    }
}
