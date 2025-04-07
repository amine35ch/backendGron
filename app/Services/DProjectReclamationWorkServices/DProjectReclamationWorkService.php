<?php

namespace App\Services\DProjectReclamationWorkServices;

use App\Models\DProjectReclamationWork;

class DProjectReclamationWorkService
{
    public function __construct(private DProjectReclamationWork $dProjectReclamationWork)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectReclamationWork::create($data);
    }

    public function edit(array $data, DProjectReclamationWork $dProjectReclamationWork)
    {
        return $dProjectReclamationWork->update($data);
    }

    public function delete(DProjectReclamationWork $dProjectReclamationWork): void
    {
        $dProjectReclamationWork->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectReclamationWork::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectReclamationWork, $filters);
    }
}
