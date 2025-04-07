<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBrandLine extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'd_brand_id',
        'd_company_id',
        'state',
    ];

    protected static function booted()
    {
        static::addGlobalScope('check-brands', function (Builder $builder) {
            if (auth()->hasUser()) {
                $builder->where('d_company_id', auth()->user()->userable_id);
            }
        });
    }

    public function brand()
    {
        return $this->belongsTo(DBrand::class, 'd_brand_id', 'type');
    }
}
