<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DScenarioWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'd_work_id',
        'd_scenario_id',
    ];
}
