<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PFormLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'title',
        'type',
        'obligatory',
        'content',
        'file_test',
        'remarque',
        'active',
        'p_form_id',
        'p_form_bloc_id',
        'display_type',
        'empty_table',
        'break_page_after',
        'bloc_title',
        'trv',
        'trv_two',
        'title_trv',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(PForm::class);
    }

    public function bloc(): BelongsTo
    {
        return $this->belongsTo(PFormBloc::class);
    }

    public function formResponse()
    {
        return $this->hasMany(DResponseForm::class, 'reference_line', 'reference');
    }
}
