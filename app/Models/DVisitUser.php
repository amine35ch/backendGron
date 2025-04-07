<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DVisitUser extends Model
{
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userable_type',
        'd_project_visit_id',
        'userable_id',
    ];

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }
}
