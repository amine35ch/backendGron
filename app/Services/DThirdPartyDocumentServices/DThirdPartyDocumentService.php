<?php

namespace App\Services\DThirdPartyDocumentServices;

use App\Models\DThirdPartyDocument;

class DThirdPartyDocumentService
{
    public function __construct(private DThirdPartyDocument $dThirdPartyDocument)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyDocument::create($data);
    }

    public function edit(array $data, DThirdPartyDocument $dThirdPartyDocument)
    {
        return $dThirdPartyDocument->update($data);
    }

    public function delete(DThirdPartyDocument $dThirdPartyDocument): void
    {

        $dThirdPartyDocument->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyDocument::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyDocument, $filters);
    }
}
