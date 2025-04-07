<?php

namespace App\Services\DBrandLineServices;

use App\Models\DBrandLine;

class DBrandLineService
{
    public function __construct(private DBrandLine $dBrandLine)
    {
    }

    public function create(array $data)
    {
        return $this->dBrandLine::create($data);
    }

    public function edit(array $data, DBrandLine $dBrandLine)
    {
        return $dBrandLine->update($data);
    }

    public function delete(DBrandLine $dBrandLine): void
    {
        $dBrandLine->delete();
    }

    public function getById(int $id)
    {
        return $this->dBrandLine::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dBrandLine, $filters);
    }
}
