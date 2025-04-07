<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectWork extends Model
{
    use Filterable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'd_project_id',
        'd_work_id',
        'installer',
        'qty',
        'd_service_id',
        'is_validated',
        'cost_audit_ttc',
        'cost_audit_ht',
        'cost_ht_simulation',
        'cost_ttc_simulation',
        'price_unit_ht',
        'unit',
        'start_date',
        'end_date',
        'cost_invoice_ht',
        'cost_invoice_ttc',
        'tva',
        'sub_contractor_entitled',
        'sub_contractor_siret',
        'entitled',
        'price_unit_ht_simulation',
        'qty_simulation',
        'description',
    ];

    protected $with = [
        'work',
    ];

    public function work()
    {
        return $this->belongsTo(DWork::class, 'd_work_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(DArticle::class, 'd_service_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }

    public function installateur()
    {
        return $this->belongsTo(DCompany::class, 'installer');
    }
}
