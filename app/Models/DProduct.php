<?php

namespace App\Models;

use App\Enums\DCompanyEnum\DCompanyProfile;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProduct extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'state',
        'type_produit_isolant',
        'norme',
        'designation',
        'reference_acerni',
        'date_validite_acerni',
        'doc_acerni',
        'reference_certita',
        'date_validite_certita',
        'doc_certita',
        'reference_avis_tech',
        'date_validite_avis_tech',
        'doc_avis_tech',
        'fiche_tech',
        'marquage_ce',
        'd_brand_id',
        'category',
        'sub_category',
        'd_company_id',
        'mar_id',
        'access',
        'is_validated',
        'bars'
    ];

    public function scopeAccessible($query)
    {
        $user = auth()->user();
        return $query->where(function ($query) use ($user) {
            $query->where('access', 0);
            if ($user->profile == DCompanyProfile::MAR->value) {
                $query->where('mar_id', $user->userable_id);
            } else {
                $query->where('d_company_id', $user->userable_id)->where('mar_id',$user->company->parent_company_id);
            }
        })->orWhere(function ($query) use ($user) {
            if ($user->profile != DCompanyProfile::MAR->value) {
                $query->where('access', 1)
                    ->where('mar_id', $user->company->parent_company_id);
            }
        });
    }

    protected $casts = [
        'bars' => 'array',
    ];

    public function brand()
    {
        return $this->belongsTo(DBrand::class, 'd_brand_id', 'id');
    }

    public function scales()
    {
        return $this->hasMany(DProductScale::class, 'd_product_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id', 'id');
    }

    public function mar()
    {
        return $this->belongsTo(DCompany::class, 'mar_id', 'id');
    }

    public function productPrices()
    {
        return $this->hasMany(DProductPrice::class, 'd_product_id', 'id');
    }

    public function getDirectoryPathAttribute()
    {
        return 'Products/product-' . $this->id;
    }

    public function getFileName($fileName)
    {
        match ($fileName) {
            'doc_acerni' => $fileName = 'Document Acerni',
            'doc_certita' => $fileName = 'Document Certita',
            'doc_avis_tech' => $fileName = 'Document Avis technique',
            'fiche_tech' => $fileName = 'Document Fiche technique',
            default => $fileName = 'Document',
        };

        return $fileName;
    }
}
