<?php

namespace App\Services\PBrandServices;

use App\Models\PBrand;

class PBrandService
{
    public function __construct(private PBrand $pBrand)
    {
    }

    public function create(array $data)
    {
        return $this->pBrand::create($data);
    }

    public function edit(array $data, PBrand $pBrand)
    {
        return $pBrand->update($data);
    }

    public function delete(PBrand $pBrand): void
    {
        $pBrand->delete();
    }

    public function getById(int $id)
    {
        return $this->pBrand::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pBrand, $filters);
    }
}
