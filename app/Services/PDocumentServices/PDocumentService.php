<?php

namespace App\Services\PDocumentServices;

use App\Models\PDocument;

class PDocumentService
{
    public function __construct(private PDocument $pDocument) {}

    public function create(array $data)
    {
        return $this->pDocument::create($data);
    }

    public function edit(array $data, PDocument $pDocument)
    {
        return $pDocument->update($data);
    }

    public function getByType(int $type)
    {
        return $this->pDocument::where('type', $type)->first();
    }

    public function delete(PDocument $pDocument): void
    {
        $pDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->pDocument::find($id);
    }

    public function getAll($filters, $noSignature = false)
    {
        if ($noSignature) {
            return $this->pDocument::where('type', '!=', 21)->filter($filters)->get();
        }
        return $this->pDocument::where('type')->filter($filters)->get();
    }
}
