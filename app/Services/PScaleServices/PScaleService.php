<?php

namespace App\Services\PScaleServices;

use App\Models\PScale;

use Illuminate\Database\Eloquent\Collection;

class PScaleService
{
    public function __construct(private PScale $pScale)
    {
    }

    public function create(array $data)
    {
        return $this->pScale::create($data);
    }

    public function edit(array $data, PScale $pScale)
    {
        return  $pScale->update($data);
    }

    public function delete(PScale $pScale): void
    {
        $pScale->delete();
    }

    public function getById(int $id)
    {
        return $this->pScale::find($id);
    }

    public function getAll($filters)
    {
        return $this->pScale::filter($filters)->with('unit')->orderBy('created_at')->get();
        // return collection($this->pScale,$filters);
    }
}
