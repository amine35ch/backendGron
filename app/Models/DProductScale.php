<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProductScale extends Model
{
    use HasFactory;

    protected $fillable = [
        'd_product_id',
        'scale_reference',
        'value',
        'unit',
    ];

    protected $with = ['scale'];

    public function scale()
    {
        return $this->belongsTo(PScale::class, 'scale_reference', 'reference')
            ->select('reference', 'type', 'entitled', 'unit');
    }
}
