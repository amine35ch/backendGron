<?php

namespace App\Enums\PStepEnum;

enum PStepOrder: int
{
    case StepSimulator = 1;
    case StepGenerateInitialDocument = 2;
    case StepOfferPriceAndContract = 3;
    case StepValidationDocumentsBeforeVisit = 4;
    case StepAppointmentMarAndTech = 5;
    case StepFillShuttleCard = 6;
    case StepDesignationAgent = 7;
    case StepAttachmentsOfVerifications = 8;
    case StepInstallerQuotationVerification = 9;
    case StepGenerateDocumentsAfterMarValidation = 10;
    case StepWorkOrder = 11;
    case StepStartWorkPlanned = 12;
    case StepGenerateReceptionSiteInspection = 13;
    case StepGenerateAccompaniementInvoice = 14;
    case StepKeyDocuments = 15;
    case StepTrackPayment = 16;
}
