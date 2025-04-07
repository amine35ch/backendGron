<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class POperationDocument extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'p_document_id',
        'p_operation_id',
    ];

    public function pDocument(): BelongsTo
    {
        return $this->belongsTo(PDocument::class, 'p_document_id', 'id');
    }
}
