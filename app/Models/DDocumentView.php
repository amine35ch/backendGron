<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDocumentView extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'd_project_document_id',
        'user_id',
        'version_count'
    ];

    public function documents()
    {
        return $this->belongsTo(DProjectDocument::class, 'd_project_document_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
