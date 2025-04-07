<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DLineResponse extends Model
{
    use HasFactory;
    protected $fillable = [
    'd_form_id',
    'p_shuttle_card_line_id',
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
}
