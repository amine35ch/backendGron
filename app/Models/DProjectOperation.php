<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DProjectOperation extends Model
{
    use Filterable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'd_project_id',
        'p_operation_id',
        // 'cost_ht',
        // 'value',
        'start_date',
        'planned_start_date',
        'd_company_id',
        'state',
        'collaborator_id',
        'is_billed',
        'reference_invoice',
    ];

    protected $with = [
        'operation',
        'company',
    ];

    // protected $attributes = [
    //     'type'
    // ];
    public function scopeMar($query)
    {
        $query->where('p_operation_id', 4);
    }
    public function scopeAud($query)
    {
        $query->where('p_operation_id', 4);
    }
    public function scopeIns($query)
    {
        $query->where('p_operation_id', 4);
    }
    public function scopeFinancier($query)
    {
        $query->where('p_operation_id', 4);
    }

    public function scopeAdministratif($query)
    {
        $query->where('p_operation_id', 5);
    }

    public function operation()
    {
        return $this->belongsTo(POperation::class, 'p_operation_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id', 'id')->select();
    }

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUnitAttribute()
    {
        return $this->operation->unit;
    }

    public function getTypeAttribute()
    {
        return $this->operation->type;
    }
}
