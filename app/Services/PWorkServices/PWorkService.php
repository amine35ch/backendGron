<?php

namespace App\Services\PWorkServices;

use App\Models\PWork;

class PWorkService
{
    public function __construct(private PWork $pWork)
    {
    }

    public function create(array $data)
    {
        return $this->pWork::create($data);
    }

    public function edit(array $data, PWork $pWork)
    {
        return $pWork->update($data);
    }

    public function delete(PWork $pWork): void
    {
        $pWork->delete();
    }

    public function getById(int $id)
    {
        return $this->pWork::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pWork, $filters);
    }
}
