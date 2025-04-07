<?php

namespace App\Observers;

use App\Models\DProjectInvoiceLine;

class DProjectInvoiceLineObserver
{
    public function creating(DProjectInvoiceLine $DProjectInvoiceLine): void
    {

        $invoice = DProjectInvoiceline::where('d_project_invoice_header_id', $DProjectInvoiceLine->d_project_invoice_header_id)->where('d_work_id', $DProjectInvoiceLine->d_work_id)->where('parent_id', null)->first();
        if ($invoice) {
            $DProjectInvoiceLine->parent_id = $invoice->id;
        } else {
            $DProjectInvoiceLine->parent_id = null;
        }
    }
    //narj3oulhaaa
}
