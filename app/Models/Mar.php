<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mar extends Model
{
    use Filterable, HasFactory, SoftDeletes;

    protected $fillable = [
        'entitled',
        'email',
        'phone_1',
        'phone_2',
        'email',
        'legal_representative',
        'representative_role',
        'trade_name',
        'city',
        'address',
        'siret',
        'approval_number',
        'signature',
        'default_pagination',
        'currency',
        'decimals',
        'pagination',
        'tva',
        'code',
    ];

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'company');
    }

    public function documents()
    {
        return $this->hasMany(MarDocument::class);
    }

    public function getDirectoryPathAttribute()
    {
        return 'Mars/Mar-'.$this->id;
    }
}
