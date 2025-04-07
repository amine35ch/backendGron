<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DProjectHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'description',
        'd_project_id',
        'userable',
        'user_id',
    ];

    public function project()
    {
        return $this->belongsTo(DProject::class);
    }

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }
}
