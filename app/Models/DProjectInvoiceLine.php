<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProjectInvoiceLine extends Model
{
    use Filterable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'd_project_invoice_header_id',
        'd_article_id',
        'parent_id',
        'unit',
        'qty',
        'unit_price_HT',
        'remise',
        'unit_price_HTNet',
        'tva',
        'unit_price_TTC',
        'amount_HT',
        'amount_HTNet',
        'amount_TVA',
        'amount_TTC',
        'designation',
        'description',
        'd_work_id',
        'sub_contractor_entitled',
        'sub_contractor_siret',
        'article_ids',
        'product_ids',
        'd_sub_contractor_id',
        'description_v2'
    ];

    protected $casts = [
        'article_ids' => 'array',
        'product_ids' => 'array',
        'description_v2' => 'array'
    ];

    protected $with = [
        'subContractor',
        'work'
    ];

    public function header()
    {
        return $this->belongsTo(DProjectInvoiceLine::class);
    }

    public function article()
    {
        return $this->belongsTo(DArticle::class, 'd_article_id');
    }

    public function childLine()
    {
        return $this->hasMany(DProjectInvoiceLine::class, 'parent_id', 'id');
    }
    public function unitData()
    {
        return $this->belongsTo(PUnit::class, 'unit', 'type');
    }
    public function work()
    {
        return $this->belongsTo(DWork::class, 'd_work_id');
    }

    public function getTotalAmountWorkAttribute()
    {
        $total = 0;
        foreach ($this->childLine as $key => $value) {
            $total = $value->amount_HT + $total;
        }

        return $this->amount_HT + $total;
    }

    public function subContractor()
    {
        return $this->belongsTo(DCompany::class, 'd_sub_contractor_id', 'id')->select('id', 'reference', 'trade_name');
    }
}
