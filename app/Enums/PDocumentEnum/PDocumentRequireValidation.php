<?php

namespace App\Enums\PDocumentEnum;

enum PDocumentRequireValidation: int
{
    case REQUIRED = 1;
    case NOT_REQUIRED = 0;
}
