<?php

namespace App\Enums\PDocumentEnum;

enum PDocumentNatureType: int
{
    case CLIENT_DOC = 0;
    case PREREQUISITE_DOCUMENT= 1;
    case MAR_OFFRE = 2;
    case ANAH_DOCUMENT = 3;
    case TECHNICAL_DOCUMENT = 4;
    case INSTALLER_OFFER = 5;
    case WORK_DOCUMENT = 6;
}
