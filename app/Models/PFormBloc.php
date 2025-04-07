<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PFormBloc extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'title',
        'obligatory',
        'annex',
        'p_form_id',
        'title_works',
        'bloc_out_of_list',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(PForm::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(PFormLine::class);
    }
}
