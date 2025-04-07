<?php

namespace App\Services\PTypeInvoiceServices;

use App\Models\PTypeInvoice;

class PTypeInvoiceService
{
    public function __construct(private PTypeInvoice $pTypeInvoice)
    {
    }

    public function create(array $data)
    {
        return $this->pTypeInvoice::create($data);
    }

    public function edit(array $data, PTypeInvoice $pTypeInvoice)
    {
        return $pTypeInvoice->update($data);
    }

    public function delete(PTypeInvoice $pTypeInvoice): void
    {
        $pTypeInvoice->delete();
    }

    public function getById(int $id)
    {
        return $this->pTypeInvoice::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->pTypeInvoice, $filters);
    }
}
