<?php

namespace App\Enums\PTypeDocumentEnum;

enum PTypeDocument: int
{
    case GENERATED = 0;
    case CERTIFIED = 1;
    case ATTACHED = 2;
    case NORMAL = 3;
    case FORM = 4;
    case DYNAMIC_FORM = 5;
    case GENERATION_AND_SIGNATURE = 6;
}
