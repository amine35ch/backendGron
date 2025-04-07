<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PStatusDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'color',
        'icon',
        'entitled',
        'status'
    ];

    protected $casts = [
        'entitled' => 'array',
    ];
}
