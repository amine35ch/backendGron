<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PScenario extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'entitled',
        'reference',
        'description',
        'state',
    ];

    public function operations()  // a supprimer
    {
        return $this->belongsToMany(
            PScenario::class,
            'p_scenario_operations',
            'p_scenario_id',
            'p_operation_id',
            'id',
            'id'
        )
            ->withPivot('p_operation_id')
            ->withTimestamps();
    }

    public function listWorks()
    {
        return $this->belongsToMany(PWork::class, 'p_scenario_works', 'p_scenario_id', 'p_work_id', 'id', 'id');
    }

    public function works()
    {
        return $this->belongsToMany(
            PScenario::class,
            'p_scenario_works',
            'p_scenario_id',
            'p_work_id',
            'id',
            'id'
        )
            ->withPivot('p_work_id')
            ->withTimestamps();
    }
}
