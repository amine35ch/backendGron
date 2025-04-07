<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PModelReference extends Model
{
    use Filterable , HasFactory;

    protected $fillable = [
        'format',
        'prefix',
        'table_name',
        'type',
        'current_count',
    ];
}
