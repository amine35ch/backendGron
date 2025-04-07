<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Permission;

class PPermissionRole extends Model
{
    use Filterable, HasFactory;

    protected $fillable = ['p_role_id', 'p_permission_id', 'permission_id'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(PRole::class, 'p_role_id');
    }

    public function pPermission(): BelongsTo
    {
        return $this->belongsTo(PPermission::class, 'p_permission_id');
    }

    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
