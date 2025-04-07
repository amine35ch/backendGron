<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DCompanyChild extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'd_company_id',
        'd_company_child_id',
    ];

    // protected static function booted()
    // {
    //     static::addGlobalScope('parent-company', function (Builder $builder) {

    //         if (auth()->hasUser()) {
    //             $user=auth()->user();
    //             if (in_array($user->profile,[DCompanyProfile::AUD->value,DCompanyProfile::INS->value])) {
    //                 $builder->where('d_company_id', $user->company->parent_company_id);
    //             }
    //         }
    //     });
    // }

  

    public function parent()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo(DCompany::class, 'd_company_child_id', 'id');
    }
}
