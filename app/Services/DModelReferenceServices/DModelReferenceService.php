<?php

namespace App\Services\DModelReferenceServices;

use App\Exceptions\CustomException;
use App\Models\DModelReference;

class DModelReferenceService
{
    public function __construct(private DModelReference $dModelReference)
    {
    }

    public function create(array $data)
    {
        return $this->dModelReference::create($data);
    }

    public function edit(array $data, DModelReference $dModelReference)
    {
        $format = $data['prefix'].$data['current_count'];
        $className = class_basename($dModelReference->table_name);
        $modalClassName = "App\\Models\\{$className}";
        $record = $modalClassName::where('reference', $format)->first();
        if ($record) {
            throw new CustomException('Vous ne pouvez pas modifier ('.$format.' existe)');
        }

        return $dModelReference->update($data);
    }

    public function delete(DModelReference $dModelReference): void
    {
        $dModelReference->delete();
    }

    public function getById(int $id)
    {
        return $this->dModelReference::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dModelReference, $filters);
    }
}
