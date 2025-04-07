<?php

namespace App\Enums\DProjectEnum;

enum DProjectState: int
{
    case INIT = 0;
    case ONGOING = 1;
    case COMPLETED = 2;
    case SUSPENDED = 3;
    case POSTPONED = 4;
    case FIRSTDEPOT = 5;
    case SECONDDEPOT = 6;
    case ONGOINGWORK = 7;
        //TO ADD
}
