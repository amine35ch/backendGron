<?php

namespace App\Services\PSubCategoryServices;

use App\Models\PSubCategory;

use Illuminate\Database\Eloquent\Collection;

class PSubCategoryService
{
    public function __construct(private PSubCategory $pSubCategory)
    {
    }

    public function create(array $data)
    {
        return $this->pSubCategory::create($data);
    }

    public function edit(array $data, PSubCategory $pSubCategory)
    {
        return  $pSubCategory->update($data);
    }

    public function delete(PSubCategory $pSubCategory): void
    {
        $pSubCategory->delete();
    }

    public function getById(int $id)
    {
        return $this->pSubCategory::find($id);
    }

    public function getAll($filters)
    {
        return $this->pSubCategory::filter($filters)->get();
        return collection($this->pSubCategory, $filters);
    }
}
