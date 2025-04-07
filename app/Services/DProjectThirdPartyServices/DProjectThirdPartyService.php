<?php

namespace App\Services\DProjectThirdPartyServices;

use App\Models\DProjectThirdParty;

class DProjectThirdPartyService
{
    public function __construct(private DProjectThirdParty $dProjectThirdParty)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectThirdParty::create($data);
    }

    public function edit(array $data, DProjectThirdParty $dProjectThirdParty)
    {
        return $dProjectThirdParty->update($data);
    }

    public function delete(DProjectThirdParty $dProjectThirdParty): void
    {
        $dProjectThirdParty->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectThirdParty::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectThirdParty, ($filters));
    }
}
