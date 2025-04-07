<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PWork extends Model
{
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'type',
        'reference',
        'unit',
        'pricing_list',
        'display_name',
    ];

    protected $casts = [
        'pricing_list' => 'array',
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(PUnit::class, 'unit', 'type');
    }
}
