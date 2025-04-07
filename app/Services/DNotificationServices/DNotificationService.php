<?php

namespace App\Services\DNotificationServices;

use App\Exceptions\CustomException;
use App\Models\DNotification;

class DNotificationService
{
    public function __construct(private DNotification $dNotification)
    {
    }

    public function create($user, $action, $description, $endPoint, $attribute = 'user_id')
    {
        return DNotification::create([
            'action' => $action,
            'description' => $description,
            $attribute => $user->id,
            'endpoint' => $endPoint,
        ]);

    }

    public function edit(array $data, DNotification $dNotification)
    {
        return $dNotification->update($data);
    }

    public function delete(DNotification $dNotification): void
    {
        $dNotification->delete();
    }

    public function getById(int $id)
    {
        return $this->dNotification::find($id);
    }

    public function getAll($filters = [])
    {
        return collection($this->dNotification, $filters);
    }

    public function countAll($filters = [])
    {
        return collection($this->dNotification, $filters + ['vue' => 0]);
    }

    public function createNotification(
        $entitled,
        $description,
        $user_id,
        $path = null
    ) {
        $notification = DNotification::create([
            'entitled' => $entitled,
            'description' => $description,
            'user_id' => $user_id,
            'vue' => '0',
            'path' => $path,
        ]);

        return $notification;
    }

    public function markAsRead(DNotification $dNotification)
    {
        if ($dNotification->vue) {
            throw new CustomException('');
        }

        return $dNotification->update(['vue' => 1]);
    }

    public function markAllAsRead()
    {
        $this->getAll()->each(function ($notification) {
            $notification->update(['vue' => 1]);
        });
    }
}