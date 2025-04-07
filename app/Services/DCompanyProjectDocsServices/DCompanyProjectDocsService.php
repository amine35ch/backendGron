<?php

namespace App\Services\DCompanyProjectDocsServices;

use App\Models\DCompanyProjectDocs;

use Illuminate\Database\Eloquent\Collection;

class DCompanyProjectDocsService
{
    public function __construct(private DCompanyProjectDocs $dCompanyProjectDocs)
    {
    }

    public function create(array $data)
    {
        return $this->dCompanyProjectDocs::create($data);
    }

    public function edit(array $data, DCompanyProjectDocs $dCompanyProjectDocs)
    {
      return  $dCompanyProjectDocs->update($data);
    }

    public function delete(DCompanyProjectDocs $dCompanyProjectDocs): void
    {
        $dCompanyProjectDocs->delete();
    }

    public function getById(int $id)
    {
        return $this->dCompanyProjectDocs::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dCompanyProjectDocs,$filters);
    }

}
