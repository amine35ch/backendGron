<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PUnit extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'entitled',
        'description',
        'type',
    ];
}
