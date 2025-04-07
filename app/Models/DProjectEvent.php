<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectEvent extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'entitled',
        'description',
        'start_date',
        'end_date',
        'type',
        'd_project_id',
        'd_project_visit_id',
        'order_step',
        'user_id',
        'd_company_id',
    ];

    protected $with = [
        'typeEvent',
    ];

    public function typeEvent()
    {
        return $this->belongsTo(PTypeEvent::class, 'type', 'type');
    }
}
