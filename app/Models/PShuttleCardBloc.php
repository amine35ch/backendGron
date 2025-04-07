<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PShuttleCardBloc extends Model
{
    use HasFactory;
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'form',
        'title',
        'type',
        'order',
        'required',
        'active',
        'style_title',
        'class',
        'left_width',
        'center_width',
        'right_width',
        'page_break_before',
        'page_break_after',
    ];

    public function lines()
    {
        return $this->hasMany(PShuttleCardLine::class, 'form_bloc', 'type');
    }
}
