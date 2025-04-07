<?php

namespace App\Services\PNotificationTypeServices;

use App\Models\PNotificationType;

use Illuminate\Database\Eloquent\Collection;

class PNotificationTypeService
{
    public function __construct(private PNotificationType $pNotificationType)
    {
    }

    public function create(array $data)
    {
        return $this->pNotificationType::create($data);
    }

    public function edit(array $data, PNotificationType $pNotificationType)
    {
      return  $pNotificationType->update($data);
    }

    public function delete(PNotificationType $pNotificationType): void
    {
        $pNotificationType->delete();
    }

    public function getById(int $id)
    {
        return $this->pNotificationType::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pNotificationType,$filters);
    }

}
