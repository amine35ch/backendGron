<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'entitled',
        'type',
    ];
}
