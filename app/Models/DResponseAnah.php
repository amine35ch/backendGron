<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DResponseAnah extends Model
{
    use HasFactory;

    protected $fillable=[
        'anah_first_depot_response',
        'time',
        'd_project_id'
    ];
}
