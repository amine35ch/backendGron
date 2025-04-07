<?php

namespace App\Services\DThirdPartyBrandServices;

use App\Models\DThirdPartyBrand;

class DThirdPartyBrandService
{
    public function __construct(private DThirdPartyBrand $dThirdPartyBrand)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyBrand::create($data);
    }

    public function edit(array $data, DThirdPartyBrand $dThirdPartyBrand)
    {
        return $dThirdPartyBrand->update($data);
    }

    public function delete(DThirdPartyBrand $dThirdPartyBrand): void
    {
        $dThirdPartyBrand->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyBrand::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyBrand, $filters);
    }
}
