<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DProjectSemulation extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'd_project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }
}
