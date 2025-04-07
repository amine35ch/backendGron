<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PDocument extends Model
{
    use Filterable, HasFactory;

    // protected $fillable = [
    //     'reference',
    //     'entitled',
    //     'type',
    //     'signature',
    //     'required_document',
    //     'blade_path',
    //     'skeleton_path',
    //     'permissions',
    //     'static_form',
    //     'required',
    //     'nature_doc',
    //     'tabs',
    //     'docu_signature',
    //     'nature_type',
    //     'is_project'
    // ];
    protected $guarded = [];
    protected $casts = [
        'permissions' => 'array',
        'tabs' => 'array',
    ];

    public function typeDocument(): BelongsTo
    {
        return $this->belongsTo(PTypeDocument::class, 'type', 'type');
    }

    protected static function booted()
    {
        static::addGlobalScope('without-hidden', function (Builder $builder) {

            $builder->where('hidden', 0);
        });
    }

    // public function projects()
    // {
    //     return $this->belongsToMany(DProject::class, 'd_project_documents')
    //         ->withTimestamps();
    // }

    // public function mars()
    // {
    //     return $this->belongsToMany(PMar::class, 'mar_documents')
    //         ->withTimestamps();
    // }

    // public function clients()
    // {
    //     return $this->belongsToMany(DClient::class, 'd_client_documents')
    //         ->withTimestamps();
    // }

    public function steps()
    {
        return $this->belongsToMany(
            PStep::class,
            'p_step_documents'
        )
            ->withTimestamps();
    }

    public function stepDocuments()
    {
        return $this->hasMany(
            PStepDocument::class,

        );
    }

    public function operations()
    {
        return $this->hasMany(
            POperationDocument::class,

        );
    }

    public function projectDocuments(): HasMany
    {
        return $this->hasMany(DProjectDocument::class);
    }
}
