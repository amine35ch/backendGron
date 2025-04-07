<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PResource extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'entitled',
        'local_fr',
        'active',
    ];

    public function permissions()
    {
        return $this->hasMany(PPermission::class, 'p_resource_id');
    }
}
