<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DClientDocumentVersion extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'path',
        'document_id',
        'version',
        'default',
    ];

    protected $appends = [
        'download_path',
        'extension',
    ];

    public function getDownloadPathAttribute()
    {
        return url('web/client-document-versions/' . $this->id . '/download');
    }

    public function document()
    {
        return $this->belongsTo(DClientDocument::class, 'document_id');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
}
