<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PStepDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_doc',
        'order_step',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(PDocument::class, 'type_doc', 'type');
    }

    public function getEntitledAttribute()
    {
        return $this->document->entitled;
    }
}
