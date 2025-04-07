<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class DProductPrice extends Model
{
    use Filterable, HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prix_achat_ht',
        'prix_achat_ttc',
        'prix_vente_ht',
        'prix_vente_ttc',
        'd_product_id',
        'd_company_id',
        'state',
        'tva',
    ];

    protected static function booted()
    {
        static::addGlobalScope('check-products', function (Builder $builder) {

            if (auth()->hasUser()) {
                $builder->where('d_company_id', auth()->user()->userable_id);
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(DProduct::class, 'd_product_id', 'id');
    }
}
