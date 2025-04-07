<?php

namespace App\Models;

use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DScenario extends Model
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
        'description',
        'state',
        'd_company_id',
        'access',
        'mar_id',
    ];

    public function works()
    {
        return $this->belongsToMany(
            DWork::class,
            'd_scenario_works',
            'd_scenario_id',
            'd_work_id',
            'id',
            'id'
        )
            ->withPivot('d_work_id')
            ->withTimestamps();
    }

    public function scopeAccessibleByUser($query, $user)
    {
        if (! $user->hasRole(RoleEnum::MARADM->value)) {
            return $query->where(function ($subquery) use ($user) {
                $subquery->where('access', 1)
                    ->where('mar_id', $user->company?->parent->d_company_id);
            })
                ->orWhere(function ($subquery) use ($user) {
                    $subquery->where('access', -1)
                        ->where('d_company_id', $user->company->id);
                });
        }

        $idCompany = $user->company->id;
        $childrensId = DCompanyChild::where('d_company_id', $user->company->id)
            ->pluck('d_company_child_id');

        return $query->where('mar_id', $idCompany)
            ->orWhereIn('d_company_id', $childrensId);
    }
}
