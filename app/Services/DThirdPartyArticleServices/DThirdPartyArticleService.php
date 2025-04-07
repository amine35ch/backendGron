<?php

namespace App\Services\DThirdPartyArticleServices;

use App\Models\DThirdPartyArticle;

class DThirdPartyArticleService
{
    public function __construct(private DThirdPartyArticle $dThirdPartyArticle)
    {
    }

    public function create(array $data)
    {
        return $this->dThirdPartyArticle::create($data);
    }

    public function edit(array $data, DThirdPartyArticle $dThirdPartyArticle)
    {
        return $dThirdPartyArticle->update($data);
    }

    public function delete(DThirdPartyArticle $dThirdPartyArticle): void
    {
        $dThirdPartyArticle->delete();
    }

    public function getById(int $id)
    {
        return $this->dThirdPartyArticle::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dThirdPartyArticle, $filters);
    }
}
