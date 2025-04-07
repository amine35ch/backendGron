<?php

namespace App\Services\PMarScaleServices;

use App\Models\PMarScale;

class PMarScaleService
{
    public function __construct(private PMarScale $pMarScale)
    {
    }

    public function create(array $data)
    {
        return $this->pMarScale::create($data);
    }

    public function edit(array $data, PMarScale $pMarScale)
    {
        return $pMarScale->update($data);
    }

    public function delete(PMarScale $pMarScale): void
    {
        $pMarScale->delete();
    }

    public function getById(int $id)
    {
        return $this->pMarScale::find($id);
    }

    public function getAll($filters)
    {
        return $this->pMarScale::all('income_classe', 'mar_scale', 'mar_cap');

        return collection($this->pMarScale, $filters);
    }
}
