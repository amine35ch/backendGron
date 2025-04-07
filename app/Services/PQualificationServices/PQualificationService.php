<?php

namespace App\Services\PQualificationServices;

use App\Models\PQualification;

use Illuminate\Database\Eloquent\Collection;

class PQualificationService
{
    public function __construct(private PQualification $pQualification)
    {
    }

    public function create(array $data)
    {
        return $this->pQualification::create($data);
    }

    public function edit(array $data, PQualification $pQualification)
    {
      return  $pQualification->update($data);
    }

    public function delete(PQualification $pQualification): void
    {
        $pQualification->delete();
    }

    public function getById(int $id)
    {
        return $this->pQualification::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pQualification,$filters);
    }

}
