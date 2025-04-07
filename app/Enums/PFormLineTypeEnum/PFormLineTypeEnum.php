<?php

namespace App\Enums\PFormLineTypeEnum;

enum PFormLineTypeEnum: int
{
    case TITLE = 0;
    case INPUT_TEXT = 1;
    case CHECK_RADIO_BOX = 2;
    case MULTI_CHECK = 3;
    case IMAGE = 4;
    case DRAW = 5;
    case TABLE = 6;
    case BASED_ON_CHOICES = 7;
    case MULTI_BAED_ON_CHOICES = 8;
}
