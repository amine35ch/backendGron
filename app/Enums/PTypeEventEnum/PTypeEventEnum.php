<?php

namespace App\Enums\PTypeEventEnum;

enum PTypeEventEnum: int
{
    case VISIT = 0;
    case PLANNED_TRV = 1;
    case REAL_TRV = 2;
    case PLANNED_END_TRV = 3;
    case REAL_END_TRV = 4;
    //TO ADD

}
