<?php

namespace App\Services\DProjectHistoryServices;

use App\Models\DProjectHistory;

class DProjectHistoryService
{
    public function __construct(private DProjectHistory $dProjectHistory)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectHistory::create($data);
    }

    public function edit(array $data, DProjectHistory $dProjectHistory)
    {
        return $dProjectHistory->update($data);
    }

    public function delete(DProjectHistory $dProjectHistory): void
    {
        $dProjectHistory->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectHistory::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectHistory, ($filters));
    }
}
