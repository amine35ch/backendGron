<?php

namespace App\Services\PUserNotificationServices;

use App\Models\PUserNotification;

class PUserNotificationService
{
    public function __construct(private PUserNotification $pUserNotification)
    {
    }

    public function create(array $data)
    {
        return $this->pUserNotification::create($data);
    }

    public function edit(array $data, PUserNotification $pUserNotification)
    {
        return $pUserNotification->update($data);
    }

    public function delete(PUserNotification $pUserNotification): void
    {
        $pUserNotification->delete();
    }

    public function getById(int $id)
    {
        return $this->pUserNotification::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pUserNotification, $filters);
    }
}
