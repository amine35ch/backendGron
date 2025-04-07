<?php

namespace App\Enums\POperationEnum;

enum POperationType: int
{
    case MAR = 0;
    case AUDIT = 1;
    case TRV = 2;
    case MANFIN = 3;
    case MANADM = 4;

    public static function getName($type)
    {
        switch ($type) {
            case 'MAR':
                return self::MAR;
            case 'AUD':
                return self::AUDIT;
            case 'INS':
                return self::TRV;
            case 'MAN':
                return self::MANADM;
            default:
                return null;
        }
    }
}
