<?php

namespace App\Enums\DInvoiceCancelCommentEnum;

enum DInvoiceCancelCommentState: int
{
    case TRAITED = 1;
    case NOT_TRAITED = 0;
}
