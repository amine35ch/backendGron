<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectOccupants extends Model
{
    use Filterable,HasFactory;

    protected $fillable = [
        'd_project_id',
        'civility',
        'first_name',
        'last_name',
        'number_children_to_born',
        'year_of_birth',
    ];
}
