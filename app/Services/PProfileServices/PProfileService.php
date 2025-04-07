<?php

namespace App\Services\PProfileServices;

use App\Models\PProfile;

class PProfileService
{
    public function __construct(private PProfile $pProfile)
    {
    }

    public function create(array $data)
    {
        return $this->pProfile::create($data);
    }

    public function edit(array $data, PProfile $pProfile)
    {
        return $pProfile->update($data);
    }

    public function delete(PProfile $pProfile): void
    {
        $pProfile->delete();
    }

    public function getById(int $id)
    {
        return $this->pProfile::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pProfile, $filters);
    }
}
