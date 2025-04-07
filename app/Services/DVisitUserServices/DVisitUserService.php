<?php

namespace App\Services\DVisitUserServices;

use App\Models\DVisitUser;

class DVisitUserService
{
    public function __construct(private DVisitUser $dVisitUser)
    {
    }

    public function create(array $data)
    {
        return $this->dVisitUser::create($data);
    }

    public function edit(array $data, DVisitUser $dVisitUser)
    {
        return $dVisitUser->update($data);
    }

    public function delete(DVisitUser $dVisitUser): void
    {
        $dVisitUser->delete();
    }

    public function getById(int $id)
    {
        return $this->dVisitUser::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dVisitUser, $filters);
    }
}
