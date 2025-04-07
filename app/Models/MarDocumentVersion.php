<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class MarDocumentVersion extends Model
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
    ];

    protected $appends = [
        'download_path',
        'extension',
    ];

    public function getDownloadPathAttribute()
    {
        return url('web/mar-document-versions/'.$this->id.'/download');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
}
