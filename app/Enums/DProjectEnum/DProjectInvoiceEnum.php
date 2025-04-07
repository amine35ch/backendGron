<?php

namespace App\Enums\DProjectEnum;

enum DProjectInvoiceEnum: int
{
    //for invoice_mar and invoice_installer
    case NOT_CREATED = 0;
    case NOT_VALIDATED = 1;
    case VALIDATED = 2;
    case PAYED = 3;

}
