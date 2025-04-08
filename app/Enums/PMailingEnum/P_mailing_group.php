<?php

namespace App\Enums\PMailingEnum;

enum P_mailing_group: int
{
    case OTHERS = 0;
    case ACCOUNTS = 1;
    case STEPS = 2;
    public function getDescription(): string
    {
        return match ($this) {
            self::OTHERS => 'Group for All.',
            self::ACCOUNTS => 'Group for Accounts notifications.',
            self::STEPS => 'Group for steps-related emails.',
        };
    }

}
