<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MarUser extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'd_company_id',
        'userable',
    ];

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }
}
