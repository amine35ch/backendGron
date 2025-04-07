<?php

namespace App\Enums\DProjectEnum;

enum DProjectStatus: int
{
    case NOT_QUALIFIED = 0;
    case NOT_ELIGIBLE = 1;
    case ENHANCED_SUPPORT = 2;
    case PENDING = 3;
    case INSERTED = 4;

    //TO ADD
}
