<?php

namespace App\Models;

use App\Enums\POperationEnum\POperationType;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class POperation extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'type',
        'name',
        'd_company_id',
        'intern',
        'extern',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(POperation::class, 'p_document_id', 'id');
    }

    public function scopeAudit(Builder $query)
    {
        $query->where('type', POperationType::AUDIT->value);
    }

    public function scopeWork(Builder $query)
    {
        $query->where('type', POperationType::TRV->value);
    }

    public function scopeMar(Builder $query)
    {
        $query->where('type', POperationType::MAR->value);
    }

    public function scopeMan(Builder $query)
    {
        $query->where('type', POperationType::MANADM->value);
    }

    public function scopeManFin(Builder $query)
    {
        $query->where('type', POperationType::MANFIN->value);
    }


    public function unit(): BelongsTo
    {
        return $this->belongsTo(PUnit::class, 'unit', 'type');
    }

    public function scenarios()
    {
        return $this->belongsToMany(POperation::class, 'p_scenario_operations')
            ->withTimestamps();
    }
}
