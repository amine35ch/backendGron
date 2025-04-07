<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PShuttleCardLine extends Model
{
    use HasFactory;
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'form_bloc',
        'title',
        'input_type',
        'content',
        'order',
        'required',
        'active',
        'style',
        'class',
        'page_break_before',
        'page_break_after',
        'update_project',
        'update_client',
        'parent',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function responses()
    {
        return $this->hasMany(DLineResponse::class, 'p_shuttle_card_line_id', 'id');
    }
}
