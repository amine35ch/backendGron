<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DNotification extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'action',
        'description',
        'vue',
        'user_id',
        'endpoint',
        'email',
        'd_company_id',
    ];

    protected static function booted()
    {
        static::addGlobalScope('check-own-notifications', function (Builder $builder) {
            if (auth()->hasUser()) {
                $user = auth()->user();
                if (auth()->hasUser()) {
                    $builder->where('user_id', $user->id);
                }
            }
        });
    }
}
