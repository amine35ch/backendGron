<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PStep extends Model
{
    use Filterable , HasFactory;

    protected $fillable = [
        'reference',
        'display_name',
        'process_type',
        'type_step',
        'order',
        'next_step_order',
        'prev_step_order',
        'state_init',
        'state_fin',
        'decision',
        'permission',
        'progression',
    ];

    protected $appends = [
        'init_state_message',
        'final_state_message',
    ];

    public function process(): BelongsTo
    {
        return $this->belongsTo(PProcess::class, 'process_type', 'type');
    }

    public function documents()
    {
        return $this->belongsToMany(PStep::class, 'p_step_documents')
            ->withTimestamps();
    }

    public function getInitStateMessageAttribute()
    {
        $user=auth()->user();
        $message=(config('step_states.'.$user->profile))[$this->order]??'';
        return $message ;
    }

    public function getFinalStateMessageAttribute()
    {
        $user=auth()->user();
        $message=(config('step_states.'.$user->profile))[$this->order]??'';
        return $message ;
    }
}
