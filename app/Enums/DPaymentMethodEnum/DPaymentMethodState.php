<?php

namespace App\Enums\DPaymentMethodEnum;

enum DPaymentMethodState: int
{
    case NOT_VALIDATED = 0;
    case VALIDATED = 1;
}
