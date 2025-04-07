<?php

namespace App\Enums\DProjectInvoiceHeaderEnum;

enum DProjectInvoiceHeaderStatusEnum: int
{
    case NOT_VALIDATED = 1;
    case VALIDATED = 2;
    case PAYED = 3;

    //TO ADD
}
