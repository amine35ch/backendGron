<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCompanyProjectDocs extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'd_company_id',
        'type_doc',
        'required',
        'nature_doc'
    ];


    public function dCompany()
    {
        return $this->belongsTo(DCompany::class);
    }

    public function pDocument()
    {
        return $this->belongsTo(PDocument::class, 'type_doc', 'type');
    }

    public function scopeSelf($query)
    {
        $company = auth()->user()->company;
        $query->where('d_company_id',$company->id);
    }
}
