<?php

namespace App\Enums\PNatureDocEnum;

enum PNatureDocEnum: int
{
    case ATTACHED = 0;
    case GENERATED = 1;
    case GENERATED_WITH_FORM = 2;
    case GENERATED_WITH_FORM_AND_CAN_BE_ATTACHED = 3;
    case GENERATED_AND_CAN_BE_ATTACHED = 4;
}
