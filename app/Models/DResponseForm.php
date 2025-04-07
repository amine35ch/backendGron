<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DResponseForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'response',
        'choice_id',
        'path_photos',
        'state',
        'reference_line',
        'location',
        'image_date',
        'd_project_id',
    ];

    protected $casts = [
        'path_photos' => 'array',
        'location' => 'array',
        'response' => 'array',
    ];

    public function line(): BelongsTo
    {
        return $this->belongsTo(PFormLine::class, 'reference_line', 'reference');
    }
}
