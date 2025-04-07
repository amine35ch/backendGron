<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectReclamation extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'entitled',
        'd_project_id',
        'date',

    ];

    protected $with = [
        'works',
    ];

    public function works()
    {
        return $this->hasMany(DProjectReclamationWork::class);
    }
}
