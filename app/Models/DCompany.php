<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\DProjectEnum\DProjectState;
use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DCompany extends Model
{
    use Filterable;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'representative_gender',
        'representative_first_name',
        'representative_last_name',
        'company_rcs',
        'reference',
        'trade_name',
        'code',
        'email',
        'email_two',
        // 'num_rge',
        'siren',
        // 'date_expiration_rge',
        'phone_number_1',
        'phone_number_2',
        'address',
        'city',
        'zip_code',
        'siret',
        'state',
        'profile',
        'tva',
        'tva_work',
        'logo',
        'identifiant_tva',
        'signature',
        'approval_number',
        'default_pagination',
        'currency',
        'decimals',
        'capital',
        'parent_company_id',
        'insurance_address',
        'insurance_rcs',
        'insurance_capital',
        'insurance_police',
        'insurance_name',
        'insurance_date',
        'position',
        'type_raison_sociale',
        'website',
        'code_ape',
        'deleted_by',
        'size_documents',
        'docu_sign_token',
        'num_decennale',
        'num_ape',
        'emissions_date_assurance',
        'end_date_assurance',
        'fiche_navette_interne',
        'quotation_interne',
        'max_projects_per_month',
        'signature_interne',
        'selfCheckIn',
        'linkToken'
    ];

    protected $appends = [
        'download_logo',
        'download_signature',
        'admin',
        'admins',
        'siret_without_space'
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
    public function profileData()
    {
        return $this->belongsTo(PProfile::class, 'profile', 'reference');
    }
    public function getNumDecennaleAttribute($value)
    {
        return $value;
    }

    public function scopeProfile($query, $profile = DCompanyProfile::MAR)
    {
        return $query->where('profile', $profile);
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id')->withTrashed();
    }

    public function scopeSelf($query)
    {
        $company = auth()->user()->company;

        $ids = $company->children
            ->pluck('d_company_child_id')->push($company->id)->toArray();
        return $query->whereIn(
            'id',
            $ids
        )->where('id', '!=', getCompanyOfConnectedUser()->id);
    }
    public function scopeSelfRoot($query, $companyId)
    {
        if ($companyId) {
            $company = $this->find($companyId);
            $ids = $company->children
                ->pluck('d_company_child_id')->push($company->id)->toArray();
            return $query->whereIn(
                'id',
                $ids
            )->where('id', '!=', getCompanyOfConnectedUser()->id);
        } else {
            return $query;
        }
    }
    public function scopeAgentInstaller($query)
    {
        $company = auth()->user()->company;

        $ids = $company->children
            ->pluck('d_company_child_id')->push($company->id)->toArray();
        return $query->whereIn(
            'id',
            $ids
        )->where('id', '!=', getCompanyOfConnectedUser()->id);
    }

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'userable');
    }

    public function parentCompany()
    {
        return $this->belongsTo(DCompany::class, 'parent_company_id', 'id');
    }

    public function getDirectoryPathAttribute()
    {
        return 'Companies/' . $this->profile . '-' . $this->id;
    }

    public function getDownloadLogoAttribute()
    {
        if ($this->logo) {
            return url('web/companies/' . $this->id . '/download-logo');
        }

        return null;
    }

    public function getAdminAttribute()
    {
        $adminRole = $this->profile . '::admin';
        $adminUser = $this->users->first(function ($user) use ($adminRole) {
            return $user->hasRole($adminRole);
        });

        return $adminUser ?: null;
    }

    public function getAdminsAttribute()
    {
        $adminRole = $this->profile . '::admin';
        $adminUsers = $this->users->filter(function ($user) use ($adminRole) {
            return $user->hasRole($adminRole);
        });

        return $adminUsers ?: null;
    }

    public function getSiretWithoutSpaceAttribute()
    {
        $siret = preg_replace('/\s+/u', '', $this->siret);
        return $siret;
    }
    public function getDownloadSignatureAttribute()
    {
        $document = $this->documents->where('name', 'Signature')->first();

        $version = $document?->versions->last();

        return $version?->download_path;
    }

    public function projects()
    {
        return $this->hasMany(
            DProject::class
        );
    }

    public function projectOperations()
    {
        return $this->hasMany(
            DProjectOperation::class
        );
    }

    public function operations()
    {
        return $this->belongsToMany(
            POperation::class,
            'd_company_operations',
            'd_company_id',
            'p_operation_id',
            'id',
            'id',
        )
            ->withTimestamps();
    }

    public function children()
    {
        return $this->hasMany(DCompanyChild::class);
    }
    public function childCompany()
    {
        return $this->hasManyThrough(
            DCompany::class,         // Final model you want to retrieve
            DCompanyChild::class,    // Intermediate model
            'd_company_id',          // Foreign key on DCompanyChild (refers to DCompany)
            'id',                    // Foreign key on DCompany (refers to DCompany itself)
            'id',                    // Local key on the parent model (usually primary key)
            'd_company_child_id'     // Local key on DCompanyChild (primary key or foreign key connecting to final model)
        )->select('reference', 'trade_name');
    }

    public function articles()
    {
        return $this->hasMany(DArticle::class, 'd_company_id');
    }

    public function brands()
    {
        return $this->hasMany(DBrand::class, 'd_company_id');
    }

    public function parent()
    {
        return $this->hasOne(DCompanyChild::class, 'd_company_child_id', 'id');
    }


    public function documents()
    {
        return $this->hasMany(DCompanyDocument::class);
    }

    public function invoiceReference()
    {
        return $this->hasMany(DInvoiceReference::class);
    }

    public function raisonSociale()
    {
        return $this->belongsTo(PRaisonTypes::class, 'type_raison_sociale', 'type');
    }

    public function projectDocs()
    {
        return $this->belongsToMany(
            PDocument::class,
            'd_company_project_docs',
            'd_company_id',
            'type_doc',
            'id',
            'type'
        )->withPivot('required', 'nature_doc', 'signature');
    }

    public function rges()
    {
        return $this->hasMany(DCompanyRge::class);
    }

    public function getProjectCountAttribute()
    {
        $operations = DB::table('d_project_operations as operations')
            ->join('d_projects', 'operations.d_project_id', '=', 'd_projects.id')
            ->join('d_clients', 'd_projects.d_client_id', '=', 'd_clients.id')
            ->where('operations.d_company_id', $this->id)
            ->whereIn('d_projects.state', [
                DProjectState::INIT->value,
                DProjectState::ONGOING->value,
                DProjectState::COMPLETED->value,
                DProjectState::FIRSTDEPOT->value,
            ])
            ->select(
                'd_projects.state',
                DB::raw('COUNT(DISTINCT d_projects.id) as total_count'),
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT(d_projects.id, "|",d_projects.reference, "|", d_clients.first_name, " ", d_clients.last_name, "|", d_projects.state, "|", d_projects.created_at) SEPARATOR ",") as d_project_data')
            )
            ->groupBy('d_projects.state')
            ->get();
        $toDoData = [];
        $currentData = [];
        $finishedData = [];
        $total = 0;
        foreach ($operations as $operation) {
            $projects = explode(',', $operation->d_project_data);

            foreach ($projects as $project) {
                $parts = explode('|', $project);

                if (count($parts) === 5) {
                    list($id, $reference, $client, $state, $created_at) = $parts;
                } else {
                    $id = $parts[0] ?? null;
                    $reference = $parts[1] ?? null;
                    $client = $parts[2] ?? null;
                    $state = $parts[3] ?? null;
                    $created_at = $parts[4] ?? null;
                }
                $data = [
                    'id' => $id,
                    'reference' => $reference,
                    'client' => $client,
                    'state' => $state,
                    'created_at' => $created_at
                ];
                if ($state == DProjectState::INIT->value) {
                    $toDoData['data'][] = $data;
                } elseif ($state == DProjectState::ONGOING->value || $state == DProjectState::FIRSTDEPOT->value) {
                    $currentData['data'][] = $data;
                } elseif ($state == DProjectState::COMPLETED->value) {
                    $finishedData['data'][] = $data;
                }
            }
            if ($state == DProjectState::INIT->value) {
                $toDoData['count'] = $operation->total_count ?? 0;
            } elseif ($state == DProjectState::ONGOING->value || $state == DProjectState::FIRSTDEPOT->value) {
                $currentData['count'] = $operation->total_count ?? 0;
            } elseif ($state == DProjectState::COMPLETED->value) {
                $finishedData['count'] = $operation->total_count ?? 0;
            }
            $total += $operation->total_count;
        }
        if (!isset($toDoData['count'])) {
            $toDoData['count'] = 0;
            $toDoData['data'] = [];
        }
        if (!isset($currentData['count'])) {
            $currentData['count'] = 0;
            $currentData['data'] = [];
        }
        if (!isset($finishedData['count'])) {
            $finishedData['count'] = 0;
            $finishedData['data'] = [];
        }
        return [
            'to_do' => $toDoData,
            'current' => $currentData,
            'finished' => $finishedData,
            'total' => $total
        ];
    }
protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (empty($model->reference)) {
            $model->reference = strtoupper(uniqid('REF_'));
        }
    });
}
}
