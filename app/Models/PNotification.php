<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNotification extends Model
{
    use Filterable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'entitled',
        'mail',
        'web',
        'subject',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            PNotification::class,
            'p_notification_roles',
            'p_notification_id',
            'p_role_id',
            'id',
            'id'
        )
            ->withPivot('p_role_id')
            ->withTimestamps();
    }
}
