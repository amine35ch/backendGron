<?php

namespace App\Services\DArticlePriceServices;

use App\Models\DProductPrice;

class DProductPriceService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return DProductPrice::create($data);
    }

    public function edit(array $data, DProductPrice $dProductPrice)
    {
        return $dProductPrice->update($data);
    }

    public function delete(DProductPrice $dProductPrice): void
    {
        $dProductPrice->delete();
    }

    public function getById(int $id)
    {
        return DProductPrice::find($id);
    }

    public function findByCompanyIdAndArticleId(int $id, $companyId)
    {
        return DProductPrice::where(
            'd_article_id',
            $id
        )->where(
            'd_company_id',
            $companyId
        )->first();
    }

    public function getAll($filters)
    {
        return collection(DProductPrice::class, $filters);
    }
}
