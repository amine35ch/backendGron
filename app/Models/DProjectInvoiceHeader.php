<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectInvoiceHeader extends Model
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
        'creator',
        'validator',
        'invoice_date',
        'state',
        'd_company_id',
        'nature',
        'start_date',
        'end_date',
        'HT_total',
        'TVA_total',
        'TTC_total',
        'TTC_anah',
        'TVA_anah',
        'HT_anah',
        'TTC_rest',
        'TVA_rest',
        'HT_rest',
        'd_project_id',
        'payed_amount',
        'is_billed',
        'type',
        'invoice_date',
        'plafond_prime',
        'prime_bonification',
        'prime_renov',
        'prime_renov_bonification',
        'status',
        'delivery_time',
    ];

    protected $with = [
        'lines',
    ];

    public function lines()
    {
        return $this->hasMany(DProjectInvoiceLine::class);
    }

    public function creatorDevis()
    {
        return $this->belongsTo(DCompany::class, 'creator');
    }

    public function project()
    {
        return $this->belongsTo(DProject::class, 'd_project_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id', 'id');
    }

    public function typeDetails()
    {
        return $this->belongsTo(PTypeInvoice::class, 'type');
    }

    public function getDirectoryPathAttribute()
    {
        return 'Projects/Project-'.$this->d_project_id;
    }

    public function comments(){

        return $this->hasMany(DInvoiceCancelComment::class);

    }
}
