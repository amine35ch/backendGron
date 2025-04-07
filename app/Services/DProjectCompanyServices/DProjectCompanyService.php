<?php

namespace App\Services\DProjectCompanyServices;

use App\Models\DProjectCompany;

class DProjectCompanyService
{
    public function __construct(private DProjectCompany $dProjectCompany)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectCompany::create($data);
    }

    public function edit(array $data, DProjectCompany $dProjectCompany)
    {
        return $dProjectCompany->update($data);
    }

    public function delete(DProjectCompany $dProjectCompany): void
    {
        $dProjectCompany->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectCompany::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectCompany, $filters);
    }
}
