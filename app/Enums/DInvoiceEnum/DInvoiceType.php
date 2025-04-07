<?php

namespace App\Enums\DInvoiceEnum;

enum DInvoiceType: string
{
    case DEVIS = 'devis';
    case INVOICE = 'invoice';
    case CANCELED_INVOICE = 'canceled_invoice';
    case CONTRACT = 'contract';

    //TO ADD
}
