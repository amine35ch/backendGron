<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectReclamationWork extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'd_project_reclamation_id',
        'd_project_work_id',
    ];

    public function reclamation()
    {
        return $this->belongsTo(DProjectReclamation::class, 'd_project_reclamation_id', 'id');
    }

    public function project_work()
    {
        return $this->belongsTo(DProjectWork::class, 'd_project_work_id', 'id');
    }
}
