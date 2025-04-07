<?php

namespace App\Models;

use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DProjectVisit extends Model
{
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public const MAX_VISITS = 2;

    protected $fillable = [
        'name',
        'type',
        'visit_date',
        'end_visit_date',
        'd_project_id',
        'd_company_id',
        'user_id',
        'state',
    ];

    public function scopeMyCompanyVisits($query, $user)
    {

        switch ($user->role) {
            case RoleEnum::MARADM->value:
                $childrenIds = $user->company->children->pluck('d_company_child_id')->toArray();
                $childrenIds[] = $user->userable_id;
                $query->whereIn('d_company_id', $childrenIds);
                break;

            case RoleEnum::MARINS->value:
                $query->where('d_company_id', $user->userable_id)->where('user_id', $user->id);
                break;

            case RoleEnum::MARSUP->value:
                $users_id = $user->teamUsers->pluck('user_id');
                $query->where('d_company_id', $user->userable_id)
                      ->whereIn('user_id', $users_id->merge([$user->id]));
                break;

            default:
                $query->where('d_company_id', $user->userable_id);
                break;
        }


    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(DCompany::class, 'd_company_id', 'id');
    }

    public function typeVisit()
    {
        return $this->belongsTo(PTypeVisit::class, 'type', 'type');
    }

    public function users(): HasMany
    {
        return $this->hasMany(
            DVisitUser::class
        );
    }

    public function event(): HasOne
    {
        return $this->hasOne(
            DProjectEvent::class
        );
    }

    public function project()
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }
}
