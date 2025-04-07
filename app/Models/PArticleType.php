<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PArticleType extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'reference',
        'description',
        'd_company_id',
        'type',
    ];

    protected static function booted()
    {
        static::addGlobalScope('mar', function (Builder $builder) {

            // if (auth()->hasUser() && !auth()->user()->hasRole('root')) {
            //     $builder->where('d_company_id', getMarConnectedUser());
            // }
        });
    }
}
