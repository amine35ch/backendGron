<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport</title>
    <style>
        @font-face {
            font-family: DejaVu Sans, 'Cambria', sans-serif !important;
            src: url('/fonts/Cambria.ttf') format('truetype');
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            !important;
            font-size: 13px
        }

        .question {
            color: #000000;
            font-size: 12px;
            font-weight: 400;
            /* font-weight: bold; */
            padding-top: 10px;
        }

        @page {
            margin-left: 75px;
            margin-right: 75px;
        }

        .sub-question {
            color: #000000;
            font-size: 12px;
            font-weight: 400;
            /* font-weight: bold; */
            padding-left: 70px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .response {
            color: #000000;
            font-size: 12px;
            font-weight: bold;
            padding-bottom: 5px;
            padding-left: 10px;
        }

        .title {
            color: #000000;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
            padding-left: 20px;
            padding-right: 20px;
            text-align: left;
        }

        .title h3 {
            position: relative;
            right: -60px;
            padding: 20px;
        }

        .sub-title {
            color: #000000;
            font-weight: bold;
            text-align: left;
            padding-left: 35px;
            padding-right: 20px;
            text-align: left;
        }

        /* .sub-sub-title {
            color: #000000;
            font-weight: bold;
            text-align: left;
            padding-left: 45px;
            padding-right: 20px;
            text-align: left;
        } */

        .row-height {
            height: 30px;
        }

        .text-bold {
            color: #ea6544;
            padding-left: 20px;
            font-size: 12px;
            font-weight: bold
        }

        .text-inside-page-one {
            padding-left: 10px;
            color: #ea6544;
            font-size: 10px;
            font-weight: bold;

            margin: 2px
        }

        .padding-text {
            padding-left: 20px;
        }

        .th-style {
            background-color: #f27454;
            border: 1px solid #f27454;
            border-collapse: collapse;
            color: white;
            font-size: 12px;
            font-weight: bold;
            height: 44px;
        }

        .table-first-page {
            border: 0px;
            width: 100%;
            background-color: rgb(245, 245, 245);
            margin-top: 4px;
            min-height: 190px;
            max-height: 190px;
            border-collapse: collapse
        }

        .bottom-page-table {
            border: 0px;
            width: 100%;
            background-color: rgb(235, 235, 243);
            min-height: 240px;
            max-height: 240px;
            border-collapse: collapse;
            margin-top: 4px
        }

        .first-tables {
            width: 98%;
            margin-left: 6px;
            background-color: rgb(253, 250, 250);
            border: 0px solid rgb(235, 235, 243);
            border-bottom: none;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .conclusion-table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }

        .conclusion-table th,
        .conclusion-table td {
            border: 1px solid black;
            padding: 8px;
        }


        /* checked */
        .custom-checkbox {
            width: 10px;
            height: 10px;
            position: relative;
            background-color: rgb(235, 235, 255);
            border: solid 1px rgb(109, 109, 109);
            font-weight: normal;
            text-align: center;
            line-height: 20px;
        }

        .custom-checkbox.checked span {
            color: rgb(251, 251, 252);
            font-size: 15px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            text-align: center;
            position: absolute;
            top: -8.5px;
            right: -2.5px;
        }

        .custom-checkbox-container {
            text-align: center;
        }

        .custom-checkbox-container .custom-checkbox {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div style=" width: 100%; position:relative; top:-30px;">
        <table style="width: 100%">
            <td><img style="height: 120px;" src="{{ resource_path('images/republic-fr.png') }}" alt="repFrancaise"></td>
            <td style="width: 70%"></td>
            <td><img style="height: 120px" src="{{ resource_path('images/agence-nationale.png') }}"
                    alt="agenceNationale"></td>
        </table>
    </div>


    <h3 class="title" style="background-color:#f1f1f1 !important;padding:-30px; height:70px;margin-top:50px;">
        <span style="margin-left:45px;position: relative; top:23px; font-size:19px; ">
            SYNTHÈSE DE LA GRILLE D'ANALYSE DU LOGEMENT
        </span>
    </h3>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:-5px;margin-top:-5px;">
        {{ $pdfDeatils['form']['blocs'][0]['lines'][0]->title }} </h4>

    <div class="types_3" style=" margin:0; margin-top: -18px; padding-top:15px;">
        <p style="margin-bottom:-10px;font-size:14px;"><b>Nom et prénom </b>(dépositaire de la demande d'aide): </p>
        <p style="height:10px;margin-top:20px;">
            {{ $pdfDeatils['form']['blocs'][0]['lines'][1]['content']['data']['fields'][0]['value'] ?? null }}</p>
    </div>

    <div class="types_3" style="margin:0; margin-top: -38px; padding-top:25px;">
        <p style="margin-bottom:-8px;font-size:14px;"><b>Adresse</b> (adresse du logement à rénover visé par une demande
            d'aide): </p>
        <table style="width:100%;">
            <tr>
                <td style="width: 4%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][3]['content']['data']['question'] ?? null }}</p>
                </td>
                <td style="width: 12%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][3]['content']['data']['fields'][0]['value'] ?? null }}
                    </p>
                </td>
                <td style="width:5%;">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][4]['content']['data']['question'] ?? null }}</p>
                </td>
                <td style="width: 52%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][4]['content']['data']['fields'][0]['value'] ?? null }}
                    </p>
                </td>
                <td style="width: 5%"></td>
            </tr>
        </table>
    </div>

    <div class="types_3" style="margin:0; margin-top: -28px; padding-top:25px; padding-bottom:-5px;">
        <table style="width:100%;margin-top:-15px;">
            <tr>
                <td style="width: 12%; ">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][5]['content']['data']['question'] ?? null }}</p>
                </td>
                <td style="width: 12%; ">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][5]['content']['data']['fields'][0]['value'] ?? null }}
                    </p>
                </td>
                <td style="width:8%; ">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][6]['content']['data']['question'] ?? null }}</p>
                </td>
                <td style="width: 55%;">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][6]['content']['data']['fields'][0]['value'] ?? null }}
                    </p>
                </td>
                <td style="width: 5%"></td>
            </tr>
        </table>
    </div>

    <div class="types_3" style=" margin:0; margin-top: -30px; padding-top:15px;">
        <p style="margin-bottom:-10px;"><b>Nom de l’accompagnateur :</b> </p>
        <p style="height:10px;">
            {{ $pdfDeatils['form']['blocs'][0]['lines'][7]['content']['data']['fields'][0]['value'] ?? null }}</p>
    </div>

    <div style="margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="padding-top:25px; ">
            <tr>

                <td><b>N° SIRET:
                    </b>{{ $pdfDeatils['form']['blocs'][0]['lines'][8]['content']['data']['fields'][0]['value'] ?? null }}
                </td>
            </tr>
        </table>
    </div>

    <div style="margin:0; margin-top: -38px; padding-top:5px; padding-bottom:25px;">
        <table style="padding-top:25px; ">
            <tr>
                <td><b>Date de visite:
                    </b>{{ $pdfDeatils['form']['blocs'][0]['lines'][9]['content']['data']['fields'][0]['value'] ?? null }}
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-bottom: 45px; height: 40px; overflow: hidden;">
        <table style="width: 100%; background-color: #f1f1f1; height: 40px;">
            <tr style="position: relative; top: 1px;">
                <td style="width: 1%"></td>
                <td style="width: 69%">
                    <h4 style="position: relative; top: -10px; font-size: 15px;"> Entrées de travaux identifiées :</h4>
                </td>
                <td style="width: 15%;"></td>
                <td style="width: 15%; font-size: 10px; text-align: right; ">
                    <p style="margin-right: 5px; position: relative; top: -10px; color: rgb(80, 80, 80)"><i>choix
                            multiples</i></p>
                </td>
            </tr>
        </table>
    </div>


    <div style=" margin:0; margin-top: -38px; padding-top:0px;">
        <table style=" margin-top:15px;width:100%">
            <tr>
                <td>
                    <table style="margin-bottom: 5px;width:100% ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][0]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left; width:40%">
                                <span>Dégradation</span>
                            </td>
                            <td style="width: 10%"></td>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][1]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left; width:50%">
                                <span>Adaptation</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>


    <div style=" margin:0; margin-top: -38px; padding-top:10px;">
        <table style=" margin-top:15px; width:100%">
            <tr>
                <td>
                    <table style="margin-bottom: 5px ;width:100%">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][2]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left; width:50%">
                                <span>Insalubrité</span>
                            </td>
                            {{-- <td style="width: 10%"></td> --}}
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][3]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left; width:50%">
                                <span>Réparation/entretien </span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div style=" margin:0; margin-top: -38px; padding-top:10px;">
        <table style=" margin-top:15px; width:100%">
            <tr>
                <td>
                    <table style="margin-bottom: 5px ;width:100%">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][4]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left; width:50%">
                                <span>Isolation (ITE, ITI, toiture, menuiseries, etc.) </span>
                            </td>
                            {{-- <td style="width: 10%"></td> --}}
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][5]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left; width:50%">
                                <span>Amélioration/embellissement</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div style=" margin:0; margin-top: -38px; padding-top:10px;margin-bottom:20px;">
        <table width="100%" style=" margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][6]['value'] ?? null == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                            <td style="text-align: left;">
                                <span>Changement du système de chauffage </span>
                            </td>

                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:20px;margin-top:-5px;">
        Signalement d'une situation manifeste d’habitat indigne, d’indécence au titre
        de la performance énergétique, de non-adaptation ou d’inadaptation
        des ressources du ménage: </h4>


    <div style="margin:0; margin-top: -38px; padding-top:15px;">
        <table style="width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][13]['content']['data']['fields'][0]['value'] ?? null)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 10%">Oui</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][13]['content']['data']['fields'][1]['value'] ?? null)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 10%">Non</td>
                <td style="width: 80%"></td>
            </tr>
        </table>
    </div>

    <div style=" margin:0; margin-top: -32px; padding-top:15px; ">
        <table style="padding-top:10px;width:100% ">
            <tr>
                <td style="width: 100%">Si oui, description de la situation: </td>
            </tr>
            <tr>
                <table style="width: 100%">
                    <tr>
                        <td style="height: 20px;width:100%">
                            {{ $pdfDeatils['form']['blocs'][0]['lines'][13]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] ?? null }}
                        </td>
                    </tr>
                </table>
            </tr>
        </table>
    </div>


    <div class="types_3" style=" margin:0; margin-top: -18px; padding-top:15px;">
        <p style="margin-bottom:-10px;">En cas de situation manifeste d’habitat indigne, nom et adresse du service à
            qui a été adressé
            le signalement :</p>
        <p style="height:30px;">
            {{ $pdfDeatils['form']['blocs'][0]['lines'][14]['content']['data']['fields'][0]['value'] ?? null }}</p>
    </div>


    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:20px;margin-top:-5px;page-break-before:always">
        Orientation vers un accompagnement renforcé:
    </h4>

    <div style="margin:0; margin-top: -38px; padding-top:15px;">
        <table style="width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][16]['content']['data']['fields'][0]['value'] ?? null)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 10%">Oui</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][16]['content']['data']['fields'][1]['value'] ?? null)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 10%">Non</td>
                <td style="width: 80%"></td>
            </tr>
        </table>
    </div>

    <div style=" margin:0; margin-top: -32px; padding-top:15px; ">
        <table style="padding-top:10px;width:100%; ">
            <tr>
                <td>Si oui, l’accompagnement renforcé sera: </td>
            </tr>
            <tr>
                <table style="width:100%; padding:15px; padding-left:0%;">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if (
                                $pdfDeatils['form']['blocs'][0]['lines'][16]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] ??
                                    null)
                                <div id="custom-checkbox-" class="custom-checkbox checked">
                                    <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                </div>
                            @else
                                <div id="custom-checkbox-" class="custom-checkbox">
                                    <span>&nbsp;</span>
                                </div>
                            @endif
                        </td>
                        <td style="width: 20%">Réalisé en propre</td>
                        <td style="width: 15%"></td>
                        <td style="vertical-align: middle; ">
                            @if (
                                $pdfDeatils['form']['blocs'][0]['lines'][16]['content']['data']['fields'][0]['ajout'][0]['fields'][1]['value'] ??
                                    null)
                                <div id="custom-checkbox-" class="custom-checkbox checked">
                                    <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                </div>
                            @else
                                <div id="custom-checkbox-" class="custom-checkbox">
                                    <span>&nbsp;</span>
                                </div>
                            @endif
                        </td>
                        <td style="width: 50%">Via une structure externe en sous-traitance</td>
                        <td style="width: 15%"></td>
                    </tr>
                </table>
            </tr>
        </table>
    </div>


    <div class="types_3" style=" margin:0; margin-top: -18px; padding-top:15px;">
        <p style="margin-bottom:-10px;"><b>Nom et adresse de la structure vers qui est redirigé le ménage:</b> </p>
        <p style="height:40px;margin-bottom:40px;">
            {{ $pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][0]['value'] ?? null }}</p>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 40px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:20px;margin-top:-5px;">
        Orientation pour une action d’adaptation:
    </h4>

    <div style="margin:0; margin-top: -32px; padding-top:15px;">
        <table style="width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][0]['value'] ?? null)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 10%">Oui</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][1]['value'] ?? null)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 10%">Non</td>
                <td style="width: 80%"></td>
            </tr>
        </table>
    </div>

    <div style=" margin:0; margin-top: -32px; padding-top:15px;margin-bottom:20px; ">
        <table style="padding-top:10px; ">
            <tr>
                <td>Si oui, précisions sur l’action d’orientation: </td>
            </tr>
            <tr>
                <table>
                    <tr>
                        <td style="height: 25px;">
                            {{ $pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] ?? null }}
                        </td>
                    </tr>
                </table>
            </tr>
        </table>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 40px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:20px;margin-top:-5px;">
        Observations :

    </h4>

    <div class="types_3" style=" margin:0; margin-top: -18px; padding-top:5px;margin-bottom:45px;">
        <p style=" height:35px;">
            {{ $pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][0]['value'] ?? (null ?? null) }}
        </p>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 40px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:20px;margin-top:-5px;">
        Signature:
    </h4>

    <div>
        <p style="font-size: 14.5px;">J’atteste avoir évalué la situation du logement à l’aide de la grille d'analyse
            fournie par l’Anah, avoir
            orienté le ménage en conséquence et effectué les signalements si la situation le nécessitait.</p>
    </div>

    <div>
        <table style="width: 100%">
            <tr>
                <td style="width: 10%">
                    <b>Date:</b>
                </td>
                @php
                    $signatureDate=\Carbon\Carbon::parse($project?->visits->where('type',0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y')
                @endphp
                <td style="width: 20%">
                    {{ $signatureDate }}
                </td>
                <td style="width:20%"></td>
                <td style="width: 45%">
                    <b>Signature de Mon Accompagnateur Rénov’</b>
                </td>
                <td style="width: 5%"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;"> <img style="width: 90px;height:100px;"
                        @if ($project->company->signature) src="{{ storage_path('app/' . $project->company->signature) }}" @endif
                        alt=""> </td>
                <td></td>
            </tr>
        </table>
    </div>

</body>

</html>
