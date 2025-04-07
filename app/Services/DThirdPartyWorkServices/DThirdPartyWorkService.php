<?php

namespace App\Services\DThirdPartyWorkServices;

use App\Models\DThirdPartyWork;

class DThirdPartyWorkService
{
    public function __construct(private DThirdPartyWork $dThirdPartyWork)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyWork::create($data);
    }

    public function edit(array $data, DThirdPartyWork $dThirdPartyWork)
    {
        return $dThirdPartyWork->update($data);
    }

    public function delete(DThirdPartyWork $dThirdPartyWork): void
    {
        $dThirdPartyWork->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyWork::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyWork, $filters);
    }
}
