<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PScenarioOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'p_operation_id',
        'p_scenario_id',
    ];
}
