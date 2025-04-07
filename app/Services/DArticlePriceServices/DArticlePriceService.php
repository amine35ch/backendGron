<?php

namespace App\Services\DArticlePriceServices;

use App\Models\DArticlePrice;

class DArticlePriceService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return DArticlePrice::create($data);
    }

    public function edit(array $data, DArticlePrice $dArticlePrice)
    {
        return $dArticlePrice->update($data);
    }

    public function delete(DArticlePrice $dArticlePrice): void
    {
        $dArticlePrice->delete();
    }

    public function getById(int $id)
    {
        return DArticlePrice::find($id);
    }

    public function findByCompanyIdAndArticleId(int $id, $companyId)
    {
        return DArticlePrice::where(
            'd_article_id',
            $id
        )->where(
            'd_company_id',
            $companyId
        )->first();
    }

    public function getAll($filters)
    {
        return collection(DArticlePrice::class, $filters);
    }
}
