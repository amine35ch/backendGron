<?php

namespace App\Services\DProjectInvoiceLineServices;

use App\Models\DProjectInvoiceLine;

class DProjectInvoiceLineService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return DProjectInvoiceLine::create($data);
    }

    public function createMany(array $data)
    {
        return DProjectInvoiceLine::insert($data);
    }

    public function edit(array $data, DProjectInvoiceLine $dProjectInvoiceLine)
    {
        return $dProjectInvoiceLine->update($data);
    }

    public function delete(DProjectInvoiceLine $dProjectInvoiceLine): void
    {
        $dProjectInvoiceLine->delete();
    }

    public function getById(int $id)
    {
        return DProjectInvoiceLine::find($id);
    }

    public function getAll($filters)
    {
        return collection(DProjectInvoiceLine::class, $filters);
    }
}
