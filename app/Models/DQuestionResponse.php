<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DQuestionResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'response',
        'reference_question',
        'd_project_id',
        'type_doc',
        'update_project',
    ];

    protected $casts = [
        'response' => 'array',
    ];
}
