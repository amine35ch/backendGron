<?php

namespace App\Services\POperationDocumentServices;

use App\Models\POperationDocument;

class POperationDocumentService
{
    public function __construct(private POperationDocument $pOperationDocument)
    {
    }

    public function create(array $data)
    {
        return $this->pOperationDocument::create($data);
    }

    public function edit(array $data, POperationDocument $pOperationDocument)
    {
        return $pOperationDocument->update($data);
    }

    public function delete(POperationDocument $pOperationDocument): void
    {
        $pOperationDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->pOperationDocument::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pOperationDocument, $filters);
    }
}
