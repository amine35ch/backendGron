<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class DLog extends Model
{
    use Filterable;

    protected $fillable = [
        'request',
        'message',
        'user_id',
        'd_company_id',
        'route',
    ];

    protected $cast = [
        'request' => 'json',
    ];

    protected $hidden = [
        'request',
    ];

    protected static function booted()
    {
        static::addGlobalScope('check-logs', function (Builder $builder) {
            $user = auth()->user();

            if ($user) {
                if ($user->profile == DCompanyProfile::MAR->value) {
                    $childrenIds = $user->company->children->pluck('d_company_child_id')->toArray();
                    $childrenIds[] = $user->userable_id;
                    $builder->whereIn('d_company_id', $childrenIds);
                } else {
                    if ($user->role == $user->profile.'::'.'admin') {
                        $builder->where('d_company_id', $user->userable_id);
                    } else {

                        $builder->where('user_id', $user->id);
                    }
                }
            }
        });
    }
}
