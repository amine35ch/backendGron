<?php

namespace App\Services\MarDocumentServices;

use App\Models\MarDocument;

class MarDocumentService
{
    public function __construct(private MarDocument $companyDocument)
    {
    }

    public function create(array $data)
    {
        return $this->marDocument::create($data);
    }

    public function edit(array $data, MarDocument $companyDocument)
    {
        return $companyDocument->update($data);
    }

    public function delete(MarDocument $companyDocument): void
    {

        $companyDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->marDocument::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->marDocument, $filters);
    }
}
