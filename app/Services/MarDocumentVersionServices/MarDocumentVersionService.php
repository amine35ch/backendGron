<?php

namespace App\Services\MarDocumentVersionServices;

use App\Models\MarDocumentVersion;

class MarDocumentVersionService
{
    public function __construct(private MarDocumentVersion $companyDocumentVersion)
    {
    }

    public function create(array $data)
    {
        return $this->marDocumentVersion::create($data);
    }

    public function edit(array $data, MarDocumentVersion $companyDocumentVersion)
    {
        return $companyDocumentVersion->update($data);
    }

    public function delete(MarDocumentVersion $companyDocumentVersion): void
    {

        $companyDocumentVersion->delete();
    }

    public function getById(int $id)
    {
        return $this->marDocumentVersion::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->marDocumentVersion, $filters);
    }
}
