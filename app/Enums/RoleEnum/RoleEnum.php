<?php

namespace App\Enums\RoleEnum;

enum RoleEnum: string
{
    case MARADM = 'MAR::admin';
    case INSADM = 'INS::admin';
    case MARCOl = 'MAR::collaborator';
    case MARSUP = 'MAR::supervisor';
    case MARINS = 'MAR::inspector';
    case INSSUP = 'INS::supervisor';
    case INSINS = 'INS::inspector';
    case INSCOL = 'INS::collaborator';
    case AUDADM = 'AUD::admin';
    case AUDCOL = 'AUD::collaborator';
    case STTADM = 'STT::admin';
    case SBBADM = 'SUB::admin';
    case STTCOL = 'STT::collaborator';
    case CLI = 'CLI::client';

    //TO ADD
}
