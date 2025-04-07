<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class DProjectDocumentVersion extends Model
{
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'path',
        'document_id',
        'default',
        'version'
    ];

    protected $appends = [
        'download_path',
        'extension',
    ];



    public function document()
    {
        return $this->belongsTo(DProjectDocument::class, 'document_id', 'id');
    }

    public function getDownloadPathAttribute()
    {
        return url('web/project-document-versions/' . $this->id . '/download');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
}
