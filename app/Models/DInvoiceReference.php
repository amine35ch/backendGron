<?php

namespace App\Models;

use App\Enums\DInvoiceEnum\DInvoiceType;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DInvoiceReference extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'format',
        'prefix',
        'type',
        'd_company_id',
        'current_count',
    ];

    // protected static function booted()
    // {
    //     static::addGlobalScope('check-reference', function (Builder $builder) {

    //         if (auth()->hasUser()) {
    //             $builder->where('d_company_id', auth()->user()->userable_id);
    //         }
    //     });
    // }

    public function scopeOwnRef($query)
    {
        return $query->where('d_company_id', auth()->user()->userable_id)->where('type','!=',DInvoiceType::CANCELED_INVOICE->value);
    }
}
