<?php

namespace App\Services\PArticleTypeServices;

use App\Models\PArticleType;

class PArticleTypeService
{
    public function __construct(private PArticleType $pArticleType)
    {
    }

    public function create(array $data)
    {
        return $this->pArticleType::create($data);
    }

    public function edit(array $data, PArticleType $pArticleType)
    {
        return $pArticleType->update($data);
    }

    public function delete(PArticleType $pArticleType): void
    {
        $pArticleType->delete();
    }

    public function getById(int $id)
    {
        return $this->pArticleType::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pArticleType, $filters);
    }
}
