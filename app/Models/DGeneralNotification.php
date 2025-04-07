<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DGeneralNotification extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'enclose',
        'description',
        'type',
        'state',
    ];

    public function scopeCanSee($query){
        $user=auth()->user();
        return $query->whereHas('roles',function($q)use($user){
            $q->where('name',$user->role);
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'd_general_notification_role', 'd_general_notification_id', 'role_id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'d_view_general_notifications', 'd_general_notification_id', 'user_id')->withPivot('viewed');
    }
}
