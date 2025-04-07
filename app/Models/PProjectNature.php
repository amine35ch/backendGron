<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PProjectNature extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'entitled',
        'type',
        'description',
    ];
}
