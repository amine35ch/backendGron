<?php

namespace App\Enums\PScaleTypeEnum;

enum PScaleTypeEnum: int
{
    case TEXT = 1;
    case NUMBER = 2;
    case DATE = 3;
    case FILE = 4;
    case LIST = 5;
}
