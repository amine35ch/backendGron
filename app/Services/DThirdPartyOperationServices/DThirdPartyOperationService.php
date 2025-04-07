<?php

namespace App\Services\DThirdPartyOperationServices;

use App\Models\DThirdPartyOperation;

class DThirdPartyOperationService
{
    public function __construct(private DThirdPartyOperation $dThirdPartyOperation)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyOperation::create($data);
    }

    public function edit(array $data, DThirdPartyOperation $dThirdPartyOperation)
    {
        return $dThirdPartyOperation->update($data);
    }

    public function delete(DThirdPartyOperation $dThirdPartyOperation): void
    {
        $dThirdPartyOperation->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyOperation::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyOperation, $filters);
    }
}
