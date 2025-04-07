<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PScale extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'entitled',
        'unit',
        'type',
        'bars'
    ];

    protected $with = ['scaleList'];

    protected $casts = [
        'bars' => 'array',
    ];

    public function scaleList()
    {
        return $this->hasMany(PScaleList::class, 'scale', 'reference');
    }

    public function unit()
    {
        return $this->belongsTo(PUnit::class, 'unit', 'type');
    }
}
