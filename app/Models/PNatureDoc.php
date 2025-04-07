<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNatureDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature',
        'entitled',
        'description',
        'color',
        'icon',
    ];
}
