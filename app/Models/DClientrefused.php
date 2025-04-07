<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class DClientrefused extends Model
{
    use Filterable, HasFactory, Notifiable, SoftDeletes;
    protected $table = 'd_clients_refused';

    /**     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'reference',
        'position',
        'gender',
        'city',
        'zip_code',
        'house_number',
        'street',
        'signature',
        'phone_number_1',
        'phone_number_2',
        'email_contact',
        'representative',
        'state',
        'd_company_id',
        'type',
        'year_of_birth',
        'number_unborn_children',
        'building',
        'stairs',
        'floor',
        'door',
        'commune',
        'deleted_by',
        'rib',
        'iban',
        'representative_contact',
        'climatic_zone',
        'email_anah',
        'password_anah',
        'mar_id'
    ];
    protected $appends = [
        'address',
        'download_signature'
    ];
    // protected static function booted()
    // {
    //     static::addGlobalScope('check-own-clients', function (Builder $builder) {

    //         if (auth()->hasUser()) {
    //             $builder->whereIn('d_company_id', getMarCompany());
    //         }
    //     });
    // }
    protected $hidden = [
        'd_company_id',
    ];


    public function scopeDeletedBy($query)
    {
        $user = auth()->user();
        $admins = $user->company->admins->pluck('id');
        if (!$user->hasRole(RoleEnum::MARADM->value)) {
            return $query->whereIn('deleted_by', $admins);
        }
        return $query;
    }
    public function scopeClientByAcces($query)
    {
        $user = auth()->user();

        if ($user->profile == DCompanyProfile::MAR->value) {
            $childCompany = $user->company->children->pluck('d_company_child_id')->toArray();
            return $query->whereIn('d_company_id', $childCompany)->where('mar_id', $user->userable_id)->orWhere('d_company_id', $user->userable_id);
        } else {
            return $query->where('d_company_id', $user->userable_id)->orWhereHas('projects.operations', function ($q) use ($user) {
                $q->where('d_company_id', $user->userable_id);
            });
        }
    }
    public function scopeClientByAccesAccepted($query)
    {
        $user = auth()->user();

        if ($user->profile == DCompanyProfile::MAR->value) {
            $childCompany = $user->company->children->pluck('d_company_child_id')->toArray();
            return $query->where('type', 1)
                ->where(
                    function ($q) use ($childCompany, $user) {
                        $q->whereIn('d_company_id', $childCompany)
                            ->where('mar_id', $user->userable_id)
                            ->orWhere('d_company_id', $user->userable_id);
                    }
                );
        } else {
            return $query->where('type', 1)->where(function ($q) use ($user) {
                $q->where('d_company_id', $user->userable_id)
                    ->orWhereHas('projects.operations', function ($q) use ($user) {
                        $q->where('d_company_id', $user->userable_id);
                    });
            });
        }
    }
    public function scopeClientByAccesPropects($query)
    {
        $user = auth()->user();

        if ($user->profile == DCompanyProfile::MAR->value) {
            $childCompany = $user->company->children->pluck('d_company_child_id')->toArray();
            return $query->where('type', 0)
                ->where(
                    function ($q) use ($childCompany, $user) {
                        $q->whereIn('d_company_id', $childCompany)
                            ->where('mar_id', $user->userable_id)
                            ->orWhere('d_company_id', $user->userable_id);
                    }
                );
        } else {
            return $query->where('type', 0)->where(function ($q) use ($user) {
                $q->where('d_company_id', $user->userable_id)
                    ->orWhereHas('projects.operations', function ($q) use ($user) {
                        $q->where('d_company_id', $user->userable_id);
                    });
            });
        }

    }
    public function projectHistories(): MorphMany
    {
        return $this->morphMany(DProjectHistory::class, 'userable');
    }
    public function getAddressAttribute()
    {
        return $this->house_number . ' ' . $this->street;
    }
    public function getDirectoryPathAttribute()
    {
        return 'Clients/Client-' . $this->id;
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(DNotification::class, 'userable');
    }

    public function documents()
    {
        return $this->hasMany(DClientDocument::class);
    }

    public function projects()
    {
        return $this->hasMany(DProject::class);
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id')->withTrashed();
    }
    public function typeClient()
    {
        return $this->belongsTo(PTypeClient::class, 'type', 'type');
    }

    public function projectDocuments()
    {
        return $this->hasManyThrough(
            DProjectDocument::class,
            DProject::class,
            'd_client_id',
            'id',
            'id',
            'id'
        );
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id');
    }
    public function getDownloadSignatureAttribute()
    {
        if ($this->signature) {
            return url('web/clients/' . $this->id . '/download-signature');
        }

        return null;
    }

}
