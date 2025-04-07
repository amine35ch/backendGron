<?php

namespace App\Services\PTVAServices;

use App\Models\PTVA;

use Illuminate\Database\Eloquent\Collection;

class PTVAService
{
    public function __construct(private PTVA $pTVA)
    {
    }

    public function create(array $data)
    {
        return $this->pTVA::create($data);
    }

    public function edit(array $data, PTVA $pTVA)
    {
        return  $pTVA->update($data);
    }

    public function delete(PTVA $pTVA): void
    {
        $pTVA->delete();
    }

    public function getById(int $id)
    {
        return $this->pTVA::find($id);
    }

    public function getAll($filters)
    {
        return $this->pTVA::filter($filters)->get();

        return collection($this->pTVA, $filters);
    }
}
