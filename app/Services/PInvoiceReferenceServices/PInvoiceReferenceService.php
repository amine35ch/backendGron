<?php

namespace App\Services\PInvoiceReferenceServices;

use App\Models\PInvoiceReference;

class PInvoiceReferenceService
{
    public function __construct(private PInvoiceReference $pInvoiceReference)
    {
    }

    public function create(array $data)
    {
        return $this->pInvoiceReference::create($data);
    }

    public function edit(array $data, PInvoiceReference $pInvoiceReference)
    {
        return $pInvoiceReference->update($data);
    }

    public function delete(PInvoiceReference $pInvoiceReference): void
    {
        $pInvoiceReference->delete();
    }

    public function getById(int $id)
    {
        return $this->pInvoiceReference::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pInvoiceReference, $filters);
    }
}
