<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRole extends Model
{
    use HasFactory;

    public function notifications()
    {
        return $this->belongsToMany(
            PNotification::class,
            'p_notification_roles',
            'p_role_id',
            'p_notification_id',
            'id',
            'id'
        )
            ->withPivot('p_role_id')
            ->withTimestamps();
    }
}
