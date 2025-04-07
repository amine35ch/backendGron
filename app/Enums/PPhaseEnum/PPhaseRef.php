<?php

namespace App\Enums\PPhaseEnum;

enum PPhaseRef: string
{
    case NEW = 'newProjectPhase';
    case SIMULATION = 'simulationPhase';
    case AUDIT = 'auditPhase';
    case QUOTATION = 'quotationPhase';
    case WORK = 'workPhase';
    case PAYMENT = 'paymentPhase';

    //TO ADD
}
