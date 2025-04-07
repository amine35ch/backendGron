<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DProjectDocument extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'type_doc',
        'd_third_party_id',
        'order_step',
        'required',
        'reference_docusign',
        'd_project_id',
        'd_company_id',
        'd_work_id',
        'path',
        'name',
        'status',
        'exported',
        'version_count',
        'envelope_id',
        'count_signature',
        'document_signature_id',
        'nature_doc',
    ];

    protected $with = [
        'versions',
        'pDocument',
    ];
    protected $appends = [
        'new'
    ];
    public function step(): BelongsTo
    {
        return $this->belongsTo(PStep::class, 'order_step', 'order');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }

    public function versions(): HasMany
    {
        return $this->hasMany(DProjectDocumentVersion::class, 'document_id', 'id');
    }
    public function getNewAttribute()
    {
        $user = auth()->user();
        $dDocumentView = $this->viewDocuments->where('user_id', $user->id)->where('version_count', $this->version_count)->first();
        return !$dDocumentView && $this->version_count > 0 ? true : false;
    }


    public function getLatestVersionAttribute()
    {
        return $this->versions()->orderByDesc('id')->first();
    }

    public function pDocument(): BelongsTo
    {
        return $this->belongsTo(PDocument::class, 'type_doc', 'type');
    }

    public function steps()
    {
        return $this->hasMany(PStepDocument::class, 'type_doc', 'type_doc');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(PStatusDoc::class, 'status', 'type');
    }

    public function getNatureFromStatusDocAttribute(): ?string
    {
        $pDocument = $this->pDocument;
        if (!$pDocument) {
            return null;
        }

        $pStatusDoc = PStatusDoc::where('status', $this->status)->first();

        if (!$pStatusDoc) {
            return null;
        }

        $natureIndex = $pDocument->nature_doc;
        $natureArray = $pStatusDoc->entitled;

        return $natureArray[$natureIndex] ?? null;
    }

    public function viewDocuments()
    {
        return $this->hasMany(DDocumentView::class, 'd_project_document_id');
    }
}
