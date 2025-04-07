<?php

namespace App\Enums\PMailingEnum;

enum P_mailing_type: int
{
    case DISABLED = 0;
    case ENABLED = 1;
    public function getName(): string
    {
        return match ($this) {
            self::DISABLED => 'disabled',
            self::ENABLED => 'enabled',
        };
    }

}
