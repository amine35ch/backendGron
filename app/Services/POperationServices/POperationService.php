<?php

namespace App\Services\POperationServices;

use App\Enums\PStateEnum\PStateEnum;
use App\Models\POperation;

class POperationService
{
    public function __construct(private POperation $pOperation)
    {
    }

    public function create(array $data)
    {
        return $this->pOperation::create($data + ['state' => PStateEnum::ACTIVATED->value]);
    }

    public function edit(array $data, POperation $pOperation)
    {
        return $pOperation->update($data);
    }

    public function delete(POperation $pOperation): void
    {
        $pOperation->delete();
    }

    public function getById(int $id)
    {
        return $this->pOperation::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pOperation, $filters);
    }

    public function getOperationsByThirdParty(POperation $pOperation)
    {
        return $pOperation->thirdParties;
    }

    public function disableOperation($pOperation)
    {
        $pOperation->state = ($pOperation->state == PStateEnum::ACTIVATED->value) ? PStateEnum::DISABLED->value : PStateEnum::ACTIVATED->value;
        $pOperation->save();

        return true;
    }
}
