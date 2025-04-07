<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\POperationEnum\POperationType;
use App\Enums\PTypeVisitEnum\PTypeVisitEnum;
use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class DProjectRefused extends Model
{
    use Filterable;
    use HasFactory;
    use SoftDeletes;
    protected $table = 'd_projects_refused';

    protected $fillable = [
        'reference',
        'status',
        'state',
        'number_of_floors',
        'income_class',
        'complement',
        'batiment',
        'floor',
        'stairs',
        'door',
        'house_number',
        'street',
        'zip_code',
        'isolated_surface',
        'city',
        'common',
        'number_and_street',
        'total_number_occupants',
        'number_of_children',
        'sum_revenue_reference_1',
        'year_of_sum_revenue_reference_1',
        'work_load_for_low_income_owners',
        'free_hosting_for_low_income_household',
        'number_of_residents_under_your_roof',
        'number_of_dependent_children',
        'sum_revenue_reference_2',
        'year_of_sum_revenue_reference_2',
        'd_client_id',
        'd_company_id',
        'current_step_order',
        'phase',
        'process_ended',
        'cost_ht_simulation',
        'cost_ttc_simulation',
        'rest_ht_simulation',
        'rest_ttc_simulation',
        'cost_ht_offre',
        'cost_ttc_offre',
        'rest_ht_offre',
        'rest_ttc_offre',
        'date_audit',
        'audit_identifier',
        'created_at',
        'primary_energy_before_work',
        'final_energy_before_work',
        'gaz_emission_before_work',
        'performance_energy_before_work',
        'surface_housing_before_work',
        'scenario',
        'primary_energy_after_work',
        'final_energy_after_work',
        'gaz_emission_after_work',
        'performance_energy_after_work',
        'surface_housing_after_work',
        'class_skip',
        'project_nature',
        'process',
        'demande_project',
        'nature_residence',
        'work_commun_parts',
        'more_than_fifteen',
        'logement_date_creation',
        'ptz_beneficiary',
        'auto_rehabilitation',
        'energy_consumption_before',
        'energy_consumption_after',
        'work_type',
        'work_description',
        'creator_id',
        'is_third_party',
        'funding_mar',
        'isolated_surface_value',
        'ceiling_height',
        'has_auditor_mar',
        'has_agent',
        'cef_init',
        'cef_fin',
        'cep_init',
        'cep_fin',
        'cumac',
        'cee',
        'departmental_help',
        'regional_help',
        'help_local_authorities',
        'eco_loan_stopped_thirty_mars',
        'renovation_advance_loan_seventeen_december',
        'other_description_of_remainder_payable',
        'anah_mprs',
        'consistency_of_well_verified_work',
        'description_reception_is_pronounced',
        'reception_is_pronounced',
        'consistency_of_work_scenarios_checked',
        'derogation_request_criteria',
        'gain_energy',
        'total_cost_energy_audit',
        'dpe_before',
        'dpe_after',
        'prime_type',
        'anah_date',
        'inspector_id',
        'supervisor_id',
        'work_planned_start',
        'work_actual_start',
        'work_planned_end',
        'work_actual_end',
        'cleared_step_order',
        'invoice_mar',
        'invoice_installer',
        'project_residence',
        'anah_folder',
        'merge_agent',
        'deleted_by',
        'class_skip_number',
        'depot_anah_1',
        'depot_anah_2',
        'anah_first_depot_response_state',
        'anah_first_depot_response'
    ];

    protected $appends = [
        'entitled',
        'step_name',
        'installer_company',
        'auditor_company',
        'mandataire_admin_company',
        'mandataire_fina_company',
        'mandataire_company',
        'address'
    ];

    protected $casts = [
        'derogation_request_criteria' => 'array',
    ];

    // protected static function booted()
    // {
    //     static::addGlobalScope('check-own-projects', function (Builder $builder) {
    //     });
    // }

    public function scopeDeletedBy($query)
    {
        $user = auth()->user();
        $admins = $user->company->admins->pluck('id');
        if (!$user->hasRole(RoleEnum::MARADM->value)) {
            return $query->whereIn('deleted_by', $admins);
        }
        return $query;
    }
    public function getAddressAttribute()
    {
        return $this->house_number . ' ' . $this->street;
    }
    public function getInstallerCompanyAttribute()
    {
        return $this->installer?->company;
    }

    public function getAuditorCompanyAttribute()
    {
        return $this->auditor?->company;
    }


    public function getMandataireCompanyAttribute()
    {
        $mandataire = $this->mandAdm ?? $this->mandfin;
        return $mandataire?->company;
    }
    public function getMandataireAdminCompanyAttribute()
    {
        return $this->mandAdm?->company;
    }

    public function getMandataireFinaCompanyAttribute()
    {
        return $this->mandfin?->company;
    }

    public function getStatusMessageAttribute()
    {
        return config('step_states.' . $this->status);
    }

    public function getEntitledAttribute()
    {
        $client = $this->client;

        return $client?->first_name . ' ' . $client?->last_name;
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id')->withTrashed();
    }

    public function scopeByUser($query, $company)
    {
        $user = auth()->user();
        $roleMar = 'MAR::';

        if (
            $user->profile !== DCompanyProfile::MAR->value &&
            ($user->hasRole($user->profile . '::supervisor') || $user->hasRole($user->profile . '::inspector'))
        ) {
            $query->whereHas('visits', function ($query) use ($user) {
                if ($user->hasRole($user->profile . '::supervisor')) {
                    $inspectors = $user->teamUsers->pluck('user_id')->push($user->id)->toArray();
                    $query->whereIn('user_id', $inspectors);
                } elseif ($user->hasRole($user->profile . '::inspector')) {
                    $query->where('user_id', $user->id);
                }
            });
        } elseif ($user->profile == DCompanyProfile::INS->value) {
            $query->whereHas('operations', function ($query) use ($company) {
                $query->where('d_company_id', $company->id)->whereIn('p_operation_id', [3, 4, 5]);
            })->whereHas('operations', function ($query) use ($company) {
                $query->where('d_company_id', $company->parent_company_id)->where('p_operation_id', 1);
            });
        } else {
            $query->whereHas('operations', function ($query) use ($company) {
                $query->where('d_company_id', $company->id);
            });
        }

        if (
            $user->profile == DCompanyProfile::MAR->value &&
            !$user->hasAnyRole([$roleMar . 'admin', $roleMar . 'collaborator'])
        ) {
            $query->whereHas('visits', function ($query) use ($user, $roleMar) {
                if ($user->hasRole($roleMar . 'supervisor')) {
                    $inspectors = $user->teamUsers->pluck('user_id')->push($user->id)->toArray();
                    $query->whereIn('user_id', $inspectors);
                } elseif ($user->hasRole($roleMar . 'inspector')) {
                    $query->where('user_id', $user->id);
                }
            });
        }

        return $query;
    }
    public function scopeByUserLeads($query, $company)
    {
        $user = auth()->user();
        $roleMar = 'MAR::';

        if (
            $user->profile !== DCompanyProfile::MAR->value &&
            ($user->hasRole($user->profile . '::supervisor') || $user->hasRole($user->profile . '::inspector'))
        ) {
            $query->whereHas('visits', function ($query) use ($user) {
                if ($user->hasRole($user->profile . '::supervisor')) {
                    $inspectors = $user->teamUsers->pluck('user_id')->push($user->id)->toArray();
                    $query->whereIn('user_id', $inspectors);
                } elseif ($user->hasRole($user->profile . '::inspector')) {
                    $query->where('user_id', $user->id);
                }
            });
        } elseif ($user->profile == DCompanyProfile::INS->value) {
            $query->whereHas('operations', function ($query) use ($company) {
                $query->where('d_company_id', $company->id)->whereIn('p_operation_id', [3, 4, 5]);
            })->whereHas('operations', function ($query) use ($company) {
                $query->where('d_company_id', $company->parent_company_id)->where('p_operation_id', 1);
            });
        } else {
            $query->whereHas('operations', function ($query) use ($company) {
                $query->where('d_company_id', $company->id);
            });
        }

        if (
            $user->profile == DCompanyProfile::MAR->value &&
            !$user->hasAnyRole([$roleMar . 'admin', $roleMar . 'collaborator'])
        ) {
            $query->whereHas('visits', function ($query) use ($user, $roleMar) {
                if ($user->hasRole($roleMar . 'supervisor')) {
                    $inspectors = $user->teamUsers->pluck('user_id')->push($user->id)->toArray();
                    $query->whereIn('user_id', $inspectors);
                } elseif ($user->hasRole($roleMar . 'inspector')) {
                    $query->where('user_id', $user->id);
                }
            });
        }
        return $query->where('project_type', 0);

    }
    public function getAuditorAttribute()
    {
        return $this->operations->where(
            'type',
            POperationType::AUDIT->value
        )->first();
    }

    public function getMandAdmAttribute()
    {
        return $this->operations->where(
            'type',
            POperationType::MANADM->value
        )->first();
    }

    public function getMandFinAttribute()
    {
        return $this->operations->where(
            'type',
            POperationType::MANFIN->value
        )->first();
    }
    public function getMarAttribute()
    {
        return $this->operations->where(
            'type',
            POperationType::MAR->value
        )->first();
    }

    public function getVisitAuditAttribute()
    {
        return $this->visits->where(
            'type',
            PTypeVisitEnum::VISIT_INSTALLER->value
        )->first();
    }

    public function client()
    {
        return $this->belongsTo(DClient::class, 'd_client_id', 'id');
    }

    public function EnergyperformanceAfterWork()
    {
        return $this->belongsTo(PProjectEnergyClass::class, 'performance_energy_after_work', 'type');
    }

    public function EnergyperformanceBeforeWork()
    {
        return $this->belongsTo(PProjectEnergyClass::class, 'performance_energy_before_work', 'type');
    }

    public function skipClass()
    {
        return $this->belongsTo(PClassSkipCount::class, 'class_skip', 'type');
    }

    public function scenarioType()
    {
        return $this->belongsTo(PScenario::class, 'scenario', 'id');
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }

    public function inspector()
    {
        return $this->belongsTo(User::class, 'inspector_id', 'id');
    }

    public function step()
    {
        return $this->belongsTo(PStep::class, 'current_step_order', 'order');
    }
    public function clearedStepOrder()
    {
        return $this->belongsTo(PStep::class, 'cleared_step_order', 'order');
    }

    public function getDirectoryPathAttribute()
    {
        return 'Projects/Project-' . $this->id;
    }

    public function documents()
    {
        return $this->hasMany(
            DProjectDocument::class
        );
    }

    public function events()
    {
        return $this->hasMany(
            DProjectEvent::class
        );
    }

    public function invoices()
    {
        return $this->hasMany(
            DProjectInvoiceHeader::class
        );
    }

    public function occupants()
    {
        return $this->hasMany(
            DProjectOccupants::class
        );
    }

    // public function thirdParties()
    // {
    //     return $this->hasMany(
    //         DProjectThirdParty::class
    //     );
    // }
    public function companies()
    {
        return $this->belongsToMany(
            DProjectCompany::class,
            'd_project_companies',
            'd_project_id',
            'd_company_id',
            'id',
            'id'
        )
            ->withPivot('d_company_id')
            ->withTimestamps();
    }

    public function decisions()
    {
        return $this->hasMany(
            DProjectDecision::class
        );
    }

    public function operations()
    {
        return $this->hasMany(
            DProjectOperation::class
        );
    }

    public function works()
    {
        return $this->hasMany(
            DProjectWork::class
        );
    }

    public function listOperations()
    {
        return $this->hasManyThrough(
            POperation::class,
            DProjectOperation::class,
            'd_project_id',
            'id',
            'id',
            'p_operation_id'
        );
    }

    public function histories()
    {
        return $this->hasMany(
            DProjectHistory::class
        );
    }

    public function typeDemandeProject()
    {
        return $this->belongsTo(PTypeDemandeProject::class, 'demande_project', 'type');
    }

    public function projectIncomeClass()
    {
        return $this->belongsTo(PProjectIncomeClass::class, 'income_class', 'type');
    }

    public function projectNature()
    {
        return $this->belongsTo(PProjectNature::class, 'project_nature', 'type');
    }

    public function projectEnergyClass()
    {
        return $this->belongsTo(PProjectEnergyClass::class, 'performance_energy_before_work', 'type');
    }

    public function currentPhase()
    {
        return $this->belongsTo(PPhase::class, 'phase', 'reference');
    }

    public function projectResidence()
    {
        return $this->belongsTo(PProjectResidence::class, 'project_residence', 'type');
    }

    public function visits()
    {
        return $this->hasMany(
            DProjectVisit::class,
            'd_project_id',
            'id'
        );
    }

    public function processType()
    {
        return $this->belongsTo(PProcess::class, 'process', 'type');
    }

    public function getNextStepAttribute()
    {
        return PStep::where('order', $this->step?->next_step_order)->first();
    }

    public function getPrevStepAttribute()
    {
        return PStep::where('order', $this->step?->prev_step_order)->first();
    }

    public function getLastStepAttribute()
    {
        $lastStep = PStep::orderByDesc('order')->first();

        return $lastStep->order == $this->current_step_order;
    }

    public function getStepNameAttribute()
    {
        return $this->step->display_name;
    }

    public function getInstallerAttribute()
    {
        return $this->operations
            ->where(
                'type',
                POperationType::TRV->value
            )->first();
    }

    // public function steps()
    // {
    //     return $this->hasManyThrough(
    //         PStep::class,
    //         PProcess::class,
    //         'd_project_id',
    //         'id',
    //         'id',
    //         'order_step'
    //     );
    // }
    public function formResponse()
    {
        return $this->hasMany(
            DResponseForm::class
        );
    }

    public function projectOccupants()
    {
        return $this->hasMany(DProjectOccupants::class);
    }

    public function workType()
    {
        return $this->belongsTo(PWorkType::class, 'work_type', 'type');
    }

    public function natureResidence()
    {
        return $this->belongsTo(PNatureResidence::class, 'nature_residence', 'type');
    }

    public function reclamation()
    {
        return $this->hasMany(
            DProjectReclamation::class
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function stepDocuments()
    {
        return $this->hasMany(
            PStepDocument::class,
            'order_step',
            'current_step_order'
        );
    }

    public function clearedStepDocuments()
    {
        return $this->hasMany(
            PStepDocument::class,
            'order_step',
            'cleared_step_order'
        );
    }

    public function comments()
    {
        return $this->hasMany(DInvoiceCancelComment::class);
    }

    public function responseAnah()
    {
        return $this->hasMany(DResponseAnah::class);
    }

    public function eSignature(): HasMany|null
    {
        return $this->hasMany(DDocumentSignature::class, 'd_project_id');
    }

    public function getLatestESignatureAttribute()
    {
        return $this->eSignature()->orderBy('id', 'desc')->first();
    }
}
