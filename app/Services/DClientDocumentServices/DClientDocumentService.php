<?php

namespace App\Services\DClientDocumentServices;

use App\Models\DClientDocument;

class DClientDocumentService
{
    public function __construct(private DClientDocument $dClientDocument)
    {
    }

    public function create(array $data)
    {
        return $this->dClientDocument::create($data);
    }

    public function edit(array $data, DClientDocument $dClientDocument)
    {
        return $dClientDocument->update($data);
    }

    public function delete(DClientDocument $dClientDocument): void
    {

        $dClientDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->dClientDocument::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dClientDocument, $filters);
    }
}
