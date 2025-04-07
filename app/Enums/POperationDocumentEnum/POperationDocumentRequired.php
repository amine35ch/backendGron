<?php

namespace App\Enums\POperationDocumentEnum;

enum POperationDocumentRequired: int
{
    case REQUIRED = 1;
    case NOT_REQUIRED = -1;
}
