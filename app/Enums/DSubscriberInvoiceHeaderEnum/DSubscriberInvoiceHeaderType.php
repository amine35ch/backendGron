<?php

namespace App\Enums\DSubscriberInvoiceHeaderEnum;

enum DSubscriberInvoiceHeaderType: int
{
    case PROJECT = 0;
    case FEATURES = 1;
    case SUBSCRIPTION = 2;
    case MIXED = 3; //feature and subscription

    //TO ADD
}
