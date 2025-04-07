<?php

namespace App\Enums\DProjectDocumentEnum;

enum DProjectFormStatus: int
{
    case NEW = 0;
    case FILLED = 1;
    case FINISHED = 2;
    case GENERATED = 3;
}
