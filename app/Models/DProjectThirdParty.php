<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectThirdParty extends Model
{
    use Filterable,HasFactory;

    protected $fillable = [
        'operation',
        'certif_required',
        'd_project_id',
        'd_third_party_id',
    ];
}
