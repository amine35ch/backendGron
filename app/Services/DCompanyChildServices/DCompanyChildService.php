<?php

namespace App\Services\DCompanyChildServices;

use App\Models\DCompanyChild;

class DCompanyChildService
{
    public function __construct(private DCompanyChild $dCompanyChild)
    {
    }

    public function create(array $data)
    {
        return $this->dCompanyChild::create($data);
    }

    public function edit(array $data, DCompanyChild $dCompanyChild)
    {
        return $dCompanyChild->update($data);
    }

    public function delete(DCompanyChild $dCompanyChild): void
    {
        $dCompanyChild->delete();
    }

    public function getById(int $id)
    {
        return $this->dCompanyChild::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dCompanyChild, $filters);
    }
}
