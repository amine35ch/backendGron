<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'active',
        'default',
        'order_step',
        'type_doc',
    ];

    public function blocs(): HasMany
    {
        return $this->hasMany(PFormBloc::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(PFormLine::class);
    }

    public function pDocument(): BelongsTo
    {
        return $this->belongsTo(PStep::class, 'type_doc', 'type');
    }

    public function shuttleBlocs(): HasMany
    {
        return $this->hasMany(PShuttleCardBloc::class);
    }

    public function shuttleLines(): HasMany
    {
        return $this->hasMany(PShuttleCardLine::class);
    }
}
