<?php

namespace App\Services\DProjectWorkArticleServices;

use App\Models\DProjectWorkArticle;

class DProjectWorkArticleService
{
    public function __construct(private DProjectWorkArticle $dProjectWorkArticle)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectWorkArticle::create($data);
    }

    public function edit(array $data, DProjectWorkArticle $dProjectWorkArticle)
    {
        return $dProjectWorkArticle->update($data);
    }

    public function delete(DProjectWorkArticle $dProjectWorkArticle): void
    {
        $dProjectWorkArticle->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectWorkArticle::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectWorkArticle, $filters);
    }
}
