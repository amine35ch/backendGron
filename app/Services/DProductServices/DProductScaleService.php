<?php

namespace App\Services\DProductServices;

use App\Models\DProductScale;

use Illuminate\Database\Eloquent\Collection;

class DProductScaleService
{
    public function __construct(private DProductScale $dProductScale)
    {
    }

    public function create(array $data)
    {
        return $this->dProductScale::create($data);
    }

    public function insert(array $data)
    {
        return $this->dProductScale::insert($data);
    }

    public function edit(array $data, DProductScale $dProductScale)
    {
        return  $dProductScale->update($data);
    }

    public function delete(DProductScale $dProductScale): void
    {
        $dProductScale->delete();
    }

    public function getById(int $id)
    {
        return $this->dProductScale::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProductScale, $filters);
    }
}
