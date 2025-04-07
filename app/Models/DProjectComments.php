<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DProjectComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'd_project_id',
        'd_company_id',
        'user_id',
        'type',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
