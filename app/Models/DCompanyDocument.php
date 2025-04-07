<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DCompanyDocument extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type_doc',
        'd_company_id',
        'path',
        'version_count',
        'creator_id',
        'creator_type',
        'validator_id',
        'validator_type',
        'is_validated',
        'required_document',
    ];

    protected $with = [
        'versions',
    ];

    public function versions(): HasMany
    {
        return $this->hasMany(DCompanyDocumentVersion::class, 'document_id', 'id');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id');
    }
}
