<?php

namespace App\Enums\DProjectVisitEnum;

enum DProjectVisitState: int
{
    case PLANNED = 0;
    case ACCEPTED = 1;
    case CANCELED = 2;
    case FINISHED = 3;
}
