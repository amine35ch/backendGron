<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTypeClient extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'entitled',
        'type',
        'description',
    ];
}
