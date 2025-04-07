<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DDocument extends Model
{
    use Filterable, HasFactory;

    protected $fillable = [
        'name',
        'path',
        'description',
        'documentable',
        'can_delete',
    ];

    protected $appends = [
        'download_path',
        'extension',
    ];

    public function getDownloadPathAttribute()
    {
        return url('web/documents/'.$this->id.'/download');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
