<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PQualification extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'entitled',
        'type'
    ];


    public function works(){
        return $this->hasMany(DWork::class);
    }

    public function operations(){
        return $this->belongsToMany(POperation::class,
            'p_qualifications_p_operations',
            'qualification_type',
            'operation_type',
            'type',
            'type'
        );
    }
}
