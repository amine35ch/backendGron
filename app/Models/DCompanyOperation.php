<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCompanyOperation extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'p_operation_id',
        'd_company_id',
    ];

    protected $with = [
        'operation',
    ];

    public function operation()
    {
        return $this->belongsTo(POperation::class, 'p_operation_id', 'id');
    }
}
