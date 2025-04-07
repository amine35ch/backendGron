<?php

namespace App\Services\DSubContractorServices;

use App\Exceptions\CustomException;
use App\Models\DSubContractor;
use Illuminate\Support\Facades\DB;

class DSubContractorService
{
    public function __construct(private DSubContractor $dSubContractor)
    {
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $subContractor = $this->dSubContractor::create($data);
            if (isset($data['works'])) {
                $this->addThirPartyWorks($data['works'], $subContractor);
            }
            if (isset($data['image'])) {
                $subContractor->update(['image' => uploadFile(
                    $data['image'],
                    $subContractor->directory_path
                )]);
            }
            DB::commit();

            return $subContractor;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function addThirPartyWorks($works, $subContractor)
    {
        $subContractor->works()->sync($works);
    }

    public function edit(array $data, DSubContractor $dSubContractor)
    {
        try {
            DB::beginTransaction();
            $dSubContractor->update($data);
            if (isset($data['works'])) {
                $this->addThirPartyWorks($data['works'], $dSubContractor);
            }
            DB::commit();

            return $dSubContractor;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new CustomException($e->getMessage());
        }
    }

    public function delete(DSubContractor $dSubContractor): void
    {
        $dSubContractor->delete();
    }

    public function getById(int $id)
    {
        return $this->dSubContractor::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dSubContractor, $filters);
    }
}
