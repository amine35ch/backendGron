<?php

namespace App\Services\DLogServices;

use App\Models\DLog;

class DLogService
{
    public function __construct(private DLog $dLog)
    {
    }

    public function create(array $data)
    {
        return $this->dLog::create($data);
    }

    public function edit(array $data, DLog $dLog)
    {
        return $dLog->update($data);
    }

    public function delete(DLog $dLog): void
    {
        $dLog->delete();
    }

    public function getById(int $id)
    {
        return $this->dLog::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dLog, $filters);
    }
}
