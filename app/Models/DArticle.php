<?php

namespace App\Models;

use App\Enums\DArticleEnum\DArticleType;
use App\Enums\DCompanyEnum\DCompanyProfile;
use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DArticle extends Model
{
    use Filterable;
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'designation',
        'description',
        'unit',
        'type',
        'path',
        'doc_name',
        'd_brand_id',
        'd_company_id',
        'mar_id',
        'access',
        'is_validated',
        'always',
        'default',
        'tva',
        // 'reference',
        'deleted_by'

    ];

    protected $hidden = [
        'access',
    ];

    public function scopeDeletedBy($query)
    {
        $user = auth()->user();
        $admins = $user->company->admins->pluck('id');
        if (!$user->hasRole(RoleEnum::MARADM->value)) {
            return $query->whereIn('deleted_by', $admins);
        }
        return $query;
    }

    public function getReferenceAttribute()
    {
        return $this->designation;
    }

    public function scopeAccessible($query)
    {
        $user = auth()->user();

        return $query->where(function ($query) use ($user) {
            $query->where('access', 0);
            if ($user->profile == DCompanyProfile::MAR->value) {
                $query->where('mar_id', $user->userable_id);
            } else {
                $query->where('d_company_id', $user->userable_id);
            }
        })->orWhere(function ($query) use ($user) {
            if ($user->profile != DCompanyProfile::MAR->value) {
                $query->where('access', 1)
                    ->where('mar_id', $user->company->parent_company_id);
            } else {
                $query->where('access', 1)
                    ->where('mar_id', $user->userable_id);
            }
        });
    }

    public function scopeServiceMar($query)
    {
        return $query->where('type', DArticleType::SERVICE_MAR->value);
    }

    public function getDirectoryPathAttribute()
    {
        return 'Articles/article-' . $this->id;
    }

    public function getDownloadPathAttribute()
    {
        return ($this->path) ? url('web/articles/' . $this->id . '/download') : null;
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id')->withTrashed();
    }
    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

    public function brand()
    {
        return $this->belongsTo(DBrand::class, 'd_brand_id', 'id');
    }


    public function articleType()
    {
        return $this->belongsTo(PArticleType::class, 'type', 'type');
    }

    public function unitType()
    {
        return $this->belongsTo(PUnit::class, 'unit', 'type');
    }

    public function articlePrices()
    {
        return $this->hasMany(DArticlePrice::class, 'd_article_id', 'id');
    }

    public function invoiceLines()
    {
        return $this->hasMany(DProjectInvoiceLine::class);
    }

    public function company()
    {
        return $this->hasOne(DCompany::class, 'id', 'd_company_id');
    }

    public function works()
    {
        return $this->belongsToMany(
            DWork::class,
            'd_article_d_work',
        );
    }
    public function mar()
    {
        return $this->hasOne(DCompany::class, 'id', 'mar_id');
    }
}