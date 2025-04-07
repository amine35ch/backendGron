<?php

namespace App\Services\PTypeDocumentServices;

use App\Models\PTypeDocument;

class PTypeDocumentService
{
    public function __construct(private PTypeDocument $pTypeDocument)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeDocument::create($data);
    }

    public function edit(array $data, PTypeDocument $pTypeDocument)
    {
        return $pTypeDocument->update($data);
    }

    public function delete(PTypeDocument $pTypeDocument): void
    {
        $pTypeDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeDocument::find($id);
    }

    public function getAll($filters)
    {
        return $this->pTypeDocument::filter($filters)->get();
    }
}
