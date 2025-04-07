<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBrand extends Model
{
    use Filterable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'entitled',
        'access',
        'd_company_id',
        'is_validated',
        'mar_id',
        'default'
    ];

    public function scopeAccessibleByCompany($query)
    {
        $user = auth()->user();
        return $query->where(function ($query) use ($user) {
            $query->where('access', 0);
            if ($user->profile == DCompanyProfile::MAR->value) {

                $query->where('mar_id', $user->userable_id);
            } else {
                $query->where('d_company_id', $user->userable_id);
            }
        })->orWhere(function ($query) use ($user) {
            $query->where('access', 1)
                ->where('mar_id', $user->profile != DCompanyProfile::MAR->value
                    ? $user->company->parent_company_id : $user->userable_id);
        });
    }

    public function lines()
    {
        return $this->hasMany(DBrandLine::class, 'd_brand_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(DArticle::class);
    }
}
