<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectDecision extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition',
        'd_project_id',
        'required',
        'decision',
        'order_step',
    ];
}
