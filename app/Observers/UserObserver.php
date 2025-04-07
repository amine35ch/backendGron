<?php

namespace App\Observers;

use App\Exceptions\CustomException;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $role=request()->segment(4);
        if ($role=='admin' || $role=='collaborator') {
        $action = 'create';
        $message = __(
            'logs.'.request()->segment(4).'.description',
            [
                'username' => auth()->user()->username,
                'user' => $user->username,
            ]
        );
        setLog($message);
        $configUrl = str_replace(
            ':id',
            $user->id,
            config("custom_routes.user.$action")
        );
    }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if (!request()->path()=='web/login') {
            setLog(__(
                'logs.user.update',
                ['reference' => $user->reference,
                'admin'=>auth()->user()->first_name.' '.auth()->user()->last_name]
            ));
        }

    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleting(User $user): void
    {
        if (! $user->projectHistories->isEmpty() || ! $user->visits->isEmpty()) {
            throw new CustomException('La suppression est impossible de cette utilisateur en raison de ses engagements dans des projets en cours');
        }
        setLog(__(
            'logs.client.delete',
            [   'admin'=>auth()->user()->first_name.' '. auth()->user()->last_name,
                'reference' => $user->first_name.' '. $user->last_name]
        ));
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
