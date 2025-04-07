<?php

namespace App\Services\PTypeClientServices;

use App\Models\PTypeClient;

class PTypeClientService
{
    public function __construct(private PTypeClient $pTypeClient)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeClient::create($data);
    }

    public function edit(array $data, PTypeClient $pTypeClient)
    {
        return $pTypeClient->update($data);
    }

    public function delete(PTypeClient $pTypeClient): void
    {
        $pTypeClient->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeClient::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeClient, $filters);
    }
}
