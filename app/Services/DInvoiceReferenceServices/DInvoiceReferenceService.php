<?php

namespace App\Services\DInvoiceReferenceServices;

use App\Models\DInvoiceReference;
use Illuminate\Support\Facades\Log;

class DInvoiceReferenceService
{
    public function __construct(private DInvoiceReference $dInvoiceReference)
    {
    }

    public function create(array $data)
    {
        return $this->dInvoiceReference::create($data);
    }

    public function edit(array $data, DInvoiceReference $dInvoiceReference)
    {
        foreach ($data['current'] as $invoiceReference) {
            $dInvoiceReference = $this->dInvoiceReference::findOrFail($invoiceReference['id']);
            $invoiceReference['format'] = $invoiceReference['prefix'] . $dInvoiceReference['current_count'];
            $dInvoiceReference->update($invoiceReference);
        }
    }

    public function delete(DInvoiceReference $dInvoiceReference): void
    {
        $dInvoiceReference->delete();
    }

    public function getById(int $id)
    {
        return $this->dInvoiceReference::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dInvoiceReference::ownRef(), $filters);
    }
}
