<?php

namespace App\Enums\PStepDocumentEnum;

enum PStepDocumentRequired: int
{
    case REQUIRED = 1;
    case NOT_REQUIRED = -1;
}
