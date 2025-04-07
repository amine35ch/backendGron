<?php

namespace App\Services\PArticleServices;

use App\Exceptions\CustomException;
use App\Models\PArticle;
use Illuminate\Support\Facades\DB;

class PArticleService
{
    public function __construct(private PArticle $pArticle)
    {
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $artricle = $this->pArticle::create($data);
            if (isset($data['file'])) {
                $artricle->update(['path' => uploadFile(
                    $data['file'],
                    $artricle->directory_path
                )]);
            }
            DB::commit();

            return $artricle;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }

    }

    public function edit(array $data, PArticle $pArticle)
    {
        try {
            DB::beginTransaction();
            $artricle = $pArticle->update($data);
            if (isset($data['file'])) {
                $pArticle->update(['path' => uploadFile(
                    $data['file'],
                    $pArticle->directory_path
                )]);
            }
            DB::commit();

            return $artricle;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function delete(PArticle $pArticle): void
    {
        $pArticle->delete();
    }

    public function getById(int $id)
    {
        return $this->pArticle::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pArticle, $filters);
    }
}
