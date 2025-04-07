<?php

namespace App\Enums\DPaymentMethodEnum;

enum DPaymentMethodType: int
{
    case CARD = 1;
    case BANK = 2;
    case PAYPAL = 3;
    case DIRECT = 4;
    case OTHER = 5;
}
