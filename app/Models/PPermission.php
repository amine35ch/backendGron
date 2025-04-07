<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PPermission extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'entitled',
        'local_fr',
        'permission_id',
        'p_resource_id',
    ];

    public function resource()
    {
        return $this->belongsTo(PResource::class, 'p_resource_id');
    }

    public function spatiePermission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
