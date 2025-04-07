<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNature extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature',
        'name',
        'description',
        'model',
        'color',
        'icon',
    ];
}
