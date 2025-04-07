<?php

namespace App\Services\DThirdPartyDocumentVersionServices;

use App\Models\DThirdPartyDocumentVersion;

class DThirdPartyDocumentVersionService
{
    public function __construct(private DThirdPartyDocumentVersion $dThirdPartyDocumentVersion)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyDocumentVersion::create($data);
    }

    public function edit(array $data, DThirdPartyDocumentVersion $dThirdPartyDocumentVersion)
    {
        return $dThirdPartyDocumentVersion->update($data);
    }

    public function delete(DThirdPartyDocumentVersion $dThirdPartyDocumentVersion): void
    {
        $dThirdPartyDocumentVersion->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyDocumentVersion::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyDocumentVersion, $filters);
    }
}
