<?php

namespace App\Enums\DProjectEnum;

enum DProjectMergeAgentEnum: int
{
    //for invoice_mar and invoice_installer
    case NOT_MERGED = 0;
    case MERGED = 1;

}
