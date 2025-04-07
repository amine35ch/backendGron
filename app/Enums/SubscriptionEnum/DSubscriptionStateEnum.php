<?php
namespace App\Enums\SubscriptionEnum;
enum DSubscriptionStateEnum: int
{

    case NOT_EXIST = -1;
    case DEACTIVATED = 0;
    case ACTIVATED = 1;
    case NOT_PAYED = 2;
    case CANCELED = 3;


    //TO ADD
}
