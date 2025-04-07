<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCompanyDocumentVersion extends Model
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
        return url('web/company-document-versions/' . $this->id . '/download');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

    public function document()
    {
        return $this->belongsTo(DCompanyDocument::class, 'document_id');
    }
}
