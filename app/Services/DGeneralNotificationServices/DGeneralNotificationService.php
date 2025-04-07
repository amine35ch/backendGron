<?php

namespace App\Services\DGeneralNotificationServices;

use App\Enums\DGeneralNotificationEnum\DGeneralNotificationEnclose;
use App\Enums\DGeneralNotificationEnum\DGeneralNotificationState;
use App\Models\DGeneralNotification;

use Illuminate\Database\Eloquent\Collection;

class DGeneralNotificationService
{
    public function __construct(private DGeneralNotification $dGeneralNotification)
    {
    }

    public function create(array $data)
    {
        return $this->dGeneralNotification::create($data);
    }

    public function edit(array $data, DGeneralNotification $dGeneralNotification)
    {
      return  $dGeneralNotification->update($data);
    }

    public function delete(DGeneralNotification $dGeneralNotification): void
    {
        $dGeneralNotification->delete();
    }

    public function getById(int $id)
    {
        return $this->dGeneralNotification::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dGeneralNotification->canSee(),$filters);
    }

    public function latest()
    {
        $user=auth()->user();
        $dGeneralNotification=$this->dGeneralNotification
        ->canSee()
        ->where('enclose', DGeneralNotificationEnclose::SHOW->value)
        ->whereDoesntHave('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->orderByRaw("FIELD(type, 2, 1)")
        ->orderByRaw("FIELD(state, 2, 1)")
        ->latest('created_at')
        ->first();
        if ($dGeneralNotification) {
            $dGeneralNotification['display']=true;
        }
        else {
            $dGeneralNotification['display']=false;
        }
        return $dGeneralNotification;
    }
    public function seen($dGeneralNotification)
    {
        $user=auth()->user();
        $dGeneralNotification->users()->attach([
            $user->id => ['viewed' => true]
        ]);
    }
}
