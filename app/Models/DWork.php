<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DWork extends Model
{
    use Filterable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'unit',
        'pricing_list',
        'd_company_id',
        'display_name',
        'access',
        'state',
        'default',
        'mar_id',
        'p_qualification_id',
    ];

    public function scopeCompany($query)
    {
        $user = auth()->user();
        return $query->where(function ($query) use ($user) {
            if ($user->profile == DCompanyProfile::MAR->value) {
                $query->where('d_company_id', $user->userable_id);
            } else {
                $query->where('d_company_id', $user->company?->parent->d_company_id);
            }
        });
    }
    protected $casts = [
        'pricing_list' => 'array',
    ];

    public function unitData()
    {
        return $this->belongsTo(PUnit::class, 'unit', 'type');
    }

    public function documents()
    {
        return $this->hasMany(
            DProjectDocument::class
        );
    }

    public function works()
    {
        return $this->hasMany(
            DProjectWork::class
        );
    }

    public function articles()
    {
        return $this->belongsToMany(DArticle::class,
            'd_article_d_work',
        );
    }

    public function qualification(){
        return $this->belongsTo(PQualification::class,'p_qualification_id');
    }
}
