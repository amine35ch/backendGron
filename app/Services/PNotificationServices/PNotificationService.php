<?php

namespace App\Services\PNotificationServices;

use App\Models\PNotification;

class PNotificationService
{
    public function __construct(private PNotification $pNotification)
    {
    }

    public function create(array $data)
    {
        return $this->pNotification::create($data);
    }

    public function edit(array $data, PNotification $pNotification)
    {
        return $pNotification->update($data);
    }

    public function delete(PNotification $pNotification): void
    {
        $pNotification->delete();
    }

    public function getById(int $id)
    {
        return $this->pNotification::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pNotification, $filters);
    }
}
