<?php

namespace App\Services\DCompanyRgeServices;

use App\Models\DCompanyRge;

use Illuminate\Database\Eloquent\Collection;

class DCompanyRgeService
{
    public function __construct(private DCompanyRge $dCompanyRge)
    {
    }

    public function create(array $data)
    {
        return $this->dCompanyRge::create($data);
    }

    public function edit(array $data, DCompanyRge $dCompanyRge)
    {
      return  $dCompanyRge->update($data);
    }

    public function delete(DCompanyRge $dCompanyRge): void
    {
        $dCompanyRge->delete();
    }

    public function getById(int $id)
    {
        return $this->dCompanyRge::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dCompanyRge,$filters);
    }

}
