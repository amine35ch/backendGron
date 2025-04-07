<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDocumentSignature extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone_number',
        'envelope_id',
        'd_project_id',
        'd_company_id',
        'user_id',
        'with_sms',
    ];
}
