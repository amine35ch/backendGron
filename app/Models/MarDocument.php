<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MarDocument extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'p_document_id',
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
        return $this->hasMany(DCollaboratorDocumentVersion::class, 'document_id', 'id');
    }
}
