<?php

namespace App\Services\DProjectInvoiceHeaderServices;

use App\Enums\DProjectEnum\DProjectInvoiceEnum;
use App\Models\DProjectInvoiceHeader;
use App\Traits\DocumentPlaceHolder;

class DProjectInvoiceHeaderService
{
    use DocumentPlaceHolder;

    public function __construct(private DProjectInvoiceHeader $dProjectInvoiceHeader)
    {
    }

    public function create(array $data)
    {
        return $this->dProjectInvoiceHeader::create($data);
    }

    public function edit(array $data, DProjectInvoiceHeader $dProjectInvoiceHeader)
    {
        return $dProjectInvoiceHeader->update($data);
    }

    public function delete(DProjectInvoiceHeader $dProjectInvoiceHeader): void
    {
        $dProjectInvoiceHeader->delete();
    }

    public function getById(int $id)
    {
        return $this->dProjectInvoiceHeader::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dProjectInvoiceHeader, $filters);
    }

}
