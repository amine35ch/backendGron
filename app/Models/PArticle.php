<?php

namespace App\Models;

use DocuSign\eSign\Model\Brand;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PArticle extends Model
{
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'designation',
        'selling_price',
        'path',
        'doc_name',
        'description',
    ];

    protected $appends = [
        'download_path',
        'extension',
    ];

    public function getDirectoryPathAttribute()
    {
        return 'Articles/article-'.$this->id;
    }

    public function getDownloadPathAttribute()
    {
        return url('web/articles/'.$this->id.'/download');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
    public function brand(){
        return $this->belongsTo(PBrand::class,'p_brand_id');
    }
}
