<?php

namespace App\Enums\DProjectDocumentEnum;

enum DProjectDocumentStatus: int
{
    case NEW = 0;
    case GENERATED_ONCE = 1;
    case NOT_SATISFIED = 2;
    case HAS_SOMETHING = 3;
    case SATISFIED = 4;

}
