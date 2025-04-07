<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DArticlePrice extends Model
{
    use Filterable, HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unit_price',
        'd_article_id',
        'd_company_id',
        'state',
    ];

    protected static function booted()
    {
        static::addGlobalScope('check-articles', function (Builder $builder) {

            if (auth()->hasUser()) {
                $builder->where('d_company_id', auth()->user()->userable_id);
            }
        });
    }

    public function article()
    {
        return $this->belongsTo(DArticle::class, 'd_article_id', 'id');
    }
}
