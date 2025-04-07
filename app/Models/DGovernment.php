<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DGovernment extends Model
{
    use Filterable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'name',
        'code',
        'state',
        'email',
        'profile',
    ];

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'userable');
    }
}
