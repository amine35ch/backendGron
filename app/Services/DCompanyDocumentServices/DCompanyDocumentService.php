<?php

namespace App\Services\DCompanyDocumentServices;

use App\Models\DCompanyDocument;

class DCompanyDocumentService
{
    public function __construct(private DCompanyDocument $dCompanyDocument)
    {
    }

    public function create(array $data)
    {
        return $this->dCompanyDocument::create($data);
    }

    public function edit(array $data, DCompanyDocument $dCompanyDocument)
    {
        return $dCompanyDocument->update($data);
    }

    public function delete(DCompanyDocument $dCompanyDocument): void
    {
        $dCompanyDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->dCompanyDocument::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dCompanyDocument, $filters);
    }
}
