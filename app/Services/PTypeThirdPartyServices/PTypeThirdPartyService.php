<?php

namespace App\Services\PTypeThirdPartyServices;

use App\Models\PTypeThirdParty;

class PTypeThirdPartyService
{
    public function __construct(private PTypeThirdParty $pTypeThirdParty)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeThirdParty::create($data);
    }

    public function edit(array $data, PTypeThirdParty $pTypeThirdParty)
    {
        return $pTypeThirdParty->update($data);
    }

    public function delete(PTypeThirdParty $pTypeThirdParty): void
    {
        $pTypeThirdParty->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeThirdParty::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeThirdParty, $filters);
    }
}
