<?php

namespace App\Enums\DInvoiceEnum;

enum DInvoiceState: int
{
    case PRE_INVOICE = 0;
    case INVOICE = 1;
    case CANCELED_INVOICE = 2;

    //TO ADD
}
