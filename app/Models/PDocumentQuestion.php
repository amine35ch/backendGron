<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDocumentQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'question',
        'type_doc',
        'update_project',
    ];

    public function questionResponses()
    {
        return $this->hasMany(DQuestionResponse::class, 'reference_question', 'reference');
    }
}
