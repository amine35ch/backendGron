<?php

namespace App\Services\PTypeEventServices;

use App\Models\PTypeEvent;

class PTypeEventService
{
    public function __construct(private PTypeEvent $pTypeEvent)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeEvent::create($data);
    }

    public function edit(array $data, PTypeEvent $pTypeEvent)
    {
        return $pTypeEvent->update($data);
    }

    public function delete(PTypeEvent $pTypeEvent): void
    {
        $pTypeEvent->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeEvent::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeEvent, $filters);
    }
}
