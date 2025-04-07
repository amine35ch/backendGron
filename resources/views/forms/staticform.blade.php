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
    {{-- @foreach ($pdfDeatils['form']['blocs'] ?? [] as $bloc) --}}
    {{-- @if (!count($bloc['lines'][0]['content']))
    @continue

    @endif --}}
    {{-- @php
        $i=0;
    @endphp
    @foreach ($pdfDeatils['form']['blocs'][0]['lines'] as $lines)
    @if ($lines['title'] != null)
    {{$i}} =>{{$lines['title']}} <br>
    @else

    {{$i}} =>{{$lines['content']['data']['question']}} <br>
    @endif

       @php
           $i++;
       @endphp
    @endforeach --}}
    {{-- {{dd($pdfDeatils['form']['blocs'][0]['lines'][5])}} --}}


    <h3 class="title" style="background-color:#f1f1f1 !important;padding:-30px; height:90px;">
        <h3 style="margin-left:80px; font-size:17px; ">
            GRILLE D'ANALYSE DU LOGEMENT
        </h3>
        <h3 style="margin-left:160px; font-size:17px; margin-top:-50px;"> QUESTIONNAIRE</h3>
    </h3>

    {{-- <div class="type_10" style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px; padding-top:-10px; padding-bottom:-30px; "> --}}
    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;margin-bottom:-5px;margin-top:-5px;">
        {{ $pdfDeatils['form']['blocs'][0]['lines'][0]->title }} </h4>
    {{-- </div> --}}

    <div class="type_5"
        style="padding-bottom:5px;padding-top:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q1 : &nbsp;&nbsp;&nbsp; Informations
            administratives pour la création de dossier : </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div class="types_3"
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <p style="margin-left:30px;margin-bottom:-10px;">
            <b>{{ $pdfDeatils['form']['blocs'][0]['lines'][2]['content']['data']['question'] }}</b>
        </p>
        <p style="margin-left:30px;">
            {{ $pdfDeatils['form']['blocs'][0]['lines'][2]['content']['data']['fields'][0]['value'] }}</p>
    </div>

    <div class="types_3"
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <p style="margin-left:30px;margin-bottom:-10px;"><b>{{ $pdfDeatils['form']['blocs'][0]['lines'][3]->title }}
            </b></p>
        <table style="width:100%;margin-left:30px;">
            <tr>
                <td style="width: 4%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][4]['content']['data']['question'] }}</p>
                </td>
                <td style="width: 12%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][4]['content']['data']['fields'][0]['value'] }}</p>
                </td>
                <td style="width:5%;">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][5]['content']['data']['question'] }}</p>
                </td>
                <td style="width: 52%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][5]['content']['data']['fields'][0]['value'] }}</p>
                </td>
                <td style="width: 5%"></td>
            </tr>
        </table>
    </div>

    <div class="types_3"
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px; padding-bottom:-5px;">
        <table style="width:100%;margin-left:30px;margin-top:-15px;">
            <tr>
                <td style="width: 12%; ">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][6]['content']['data']['question'] }}</p>
                </td>
                <td style="width: 12%; ">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][6]['content']['data']['fields'][0]['value'] }}</p>
                </td>
                <td style="width:8%; ">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][7]['content']['data']['question'] }}</p>
                </td>
                <td style="width: 55%;">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][7]['content']['data']['fields'][0]['value'] }}</p>
                </td>
                <td style="width: 5%"></td>
            </tr>
        </table>
    </div>
    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q2 : &nbsp;&nbsp;&nbsp; Revenu fiscal du
            ménage: </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div class="types_3"
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:5px; ">
        <p style="margin-left:30px;">
            {{ number_format(round($pdfDeatils['form']['blocs'][0]['lines'][9]['content']['data']['fields'][0]['value'], 2), 2, ',', ' ') }}&nbsp;€
        </p>
    </div>


    <div style="margin-bottom: 15px;">

        <table
            style="width: 100%;padding-bottom:0px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; padding-bottom:-10px;  ">
            <tr style="position: relative; top:10px;">
                <td style="width: 1%"></td>
                <td style="width: 59%">
                    <h4 style="position: relative; top:-10px;font-size:15px;"> Q3 : &nbsp;&nbsp;&nbsp; Occupation du
                        logement:</h4>
                </td>
                <td style="width: 25%;"></td>
                <td style="width: 15%; font-size:10px;text-align: right; ">
                    <p style="margin-right:5px;position: relative; top:-10px;color:rgb(80, 80, 80)"><i>choix
                            multiples</i></p>
                </td>
            </tr>
        </table>
        <span
            style="display: block; border-top: 1px solid black; position: relative;top:-25px; width:97.8%; left:6px; "></span>
    </div>

    <div class="types_3"
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -48px; padding-top:-10px; ">
        <table>
            <tr>
                <td>
                    <p style="margin-left:55px;">
                        <b>{{ $pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['question'] }} </b>
                    </p>
                </td>
                <td>
                    <p style="margin-left:5px;">
                        {{ $pdfDeatils['form']['blocs'][0]['lines'][11]['content']['data']['fields'][0]['value'] }}&nbsp;personnes
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="padding-top:20px;  width:100%">
            <tr>
                <td style="width: 8%"></td>
                <td style="width: 57%">enfants de moins de 6 ans </td>
                <td style="width:8% "></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][12]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 2.5%"></td>
                <td style="width:10% ">Oui</td>

                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][12]['content']['data']['fields'][1]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 2.5%"></td>
                <td style="width: 10%">Non</td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 5%"></td>
                <td style="width: 65%">dont personnes handicapées (tout âge) </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][13]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][13]['content']['data']['fields'][1]['value'] == 1)
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 5%"></td>
                <td style="width: 65%">dont personnes de plus de 70 ans </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][14]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][14]['content']['data']['fields'][1]['value'] == 1)
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom: 8px solid #f1f1f1;padding-bottom:10px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 5%"></td>
                <td style="width: 65%">dont personnes de 60 à 69 ans avec un GIR (perte d'autonomie)</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][15]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][15]['content']['data']['fields'][1]['value'] == 1)
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
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; padding-top:5px; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q4 : &nbsp;&nbsp;&nbsp; Statut
            d’occupation du ménage:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Propriétaire: résidence principale </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][1]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Propriétaire: logement destiné à la location </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][2]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Propriétaire usufruitier </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][3]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Occupant à titre gratuit </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][4]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Locataire </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][5]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Nu-propriétaire </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom: 8px solid #f1f1f1;padding-bottom:5px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][6]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Autre, préciser:</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $pdfDeatils['form']['blocs'][0]['lines'][17]['content']['data']['fields'][6]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-bottom: 5px;">

        <table
            style="width: 100%;padding-bottom:0px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 5px solid #f1f1f1; padding-bottom:-10px;page-break-before:always;  ">
            <tr style="position: relative; top:10px;">
                <td style="width: 1%"></td>
                <td style="width: 64%">
                    <h4 style="position: relative; top:-13px;font-size:15px;"> Q5 : &nbsp;&nbsp;&nbsp; Décisions
                        administratives ou constat sur le logement:</h4>
                </td>
                <td style="width: 20%;"></td>
                <td style="width: 15%; font-size:10px;text-align: right; ">
                    <p style="margin-right:5px;position: relative; top:-10px;color:rgb(80, 80, 80)"><i>choix
                            multiples</i></p>
                </td>
            </tr>
        </table>
        <span
            style="display: block; border-top: 1px solid black; position: relative;top:-25px; width:97.8%; left:6px; "></span>
    </div>


    <div style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][0]['value'] == 1)
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
                                <span> Un arrêté de mise en sécurité ou de traitement de l'insalubrité, arrêté de
                                    péril;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][1]['value'] == 1)
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
                                <span>Une notification de travaux; </span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][2]['value'] == 1)
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
                                <span> Un justificatif de handicap ou de perte d’autonomie;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][3]['value'] == 1)
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
                                <span> Risque d’exposition au plomb;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][4]['value'] == 1)
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
                                <span></span>Non-conformité au Règlement sanitaire départemental (RSD);</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][5]['value'] == 1)
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
                                <span>Un signalement antérieur du ménage auprès du pôle départemental de l'habitat
                                    ;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][6]['value'] == 1)
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
                                <span> Aucun des constats précédents ;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][19]['content']['data']['fields'][7]['value'] == 1)
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
                                <span>Ne sait pas.</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div style="margin-bottom: 0px;">

        <table
            style="width: 100%;padding-bottom:0px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 5px solid #f1f1f1; padding-bottom:-10px;  ">
            <tr style="position: relative; top:10px;">
                <td style="width: 1%"></td>
                <td style="width: 69%">
                    <h4 style="position: relative; top:-13px;font-size:15px;"> Q6 : &nbsp;&nbsp;&nbsp; Motivations des
                        travaux que souhaite réaliser le ménage:</h4>
                </td>
                <td style="width: 15%;"></td>
                <td style="width: 15%; font-size:10px;text-align: right; ">
                    <p style="margin-right:5px;position: relative; top:-10px;color:rgb(80, 80, 80)"><i>choix
                            multiples</i></p>
                </td>
            </tr>
        </table>
        <span
            style="display: block; border-top: 1px solid black; position: relative;top:-25px; width:97.8%; left:6px; "></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Faire des économies d’énergie; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][1]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Corriger des gros défauts, anticiper ou réparer une panne; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][2]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Effectuer des travaux pour des raisons médicales ; </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][3]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Modifier le logement pour répondre aux besoins du ménage; </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][4]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Améliorer le confort ; </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][5]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td>
                    <p> Profiter de travaux pour avoir une maison plus écologique; </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px; margin-bottom:-35px;">
        <table style="margin-left:30px;padding-bottom:-50px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][6]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Autre, préciser: </p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p style="position: relative; top:-25px;">
                        {{ $pdfDeatils['form']['blocs'][0]['lines'][21]['content']['data']['fields'][6]['ajout'][0]['fields'][0]['value'] }}
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 5px solid #f1f1f1;">
        <h4 style="position: relative;  left:10px; top:-13px;font-size:15px;"> Q7 : &nbsp;&nbsp;&nbsp; Selon vous, quel
            est le niveau d’accompagnement nécessaire pour le ménage? </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 10px;width:100%; ">
            <tr>
                <td style="width: 30%">Le ménage a une bonne idée des travaux à réaliser</td>
                <td style="width: 6%">
                    <table style="width: 100%;">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;margin: 0;">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][0]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: -10px;"><b>1</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][1]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][2]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>3</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][3]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>4</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][4]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>5</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 38%">Le ménage est un peu perdu sur ce qu’il convient de faire</td>
                <td style="width: 2%"></td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 5px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-13px;font-size:15px;"> Q8 : &nbsp;&nbsp;&nbsp; Selon vous, quel
            est le degré de confiance du ménage vis-à-vis de la conduite du chantier? </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 10px;width:100%; ">
            <tr>
                <td style="width: 30%">Le ménage se sent capable de piloter le chantier</td>
                <td style="width: 6%">
                    <table style="width: 100%;">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;margin: 0;">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][0]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>1</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][1]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][2]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>3</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][3]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>4</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][4]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>5</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 38%">Le ménage craint de « se faire avoir » par les artisans</td>
                <td style="width: 2%"></td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q9 : &nbsp;&nbsp;&nbsp; Selon vous, quel
            est le degré d’acceptation des perturbations liées aux travaux? </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 10px;width:100%; ">
            <tr>
                <td style="width: 30%">Le ménage peut accepter un chantier important </td>
                <td style="width: 6%">
                    <table style="width: 100%;">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;margin: 0;">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][0]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>1</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][1]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][2]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>3</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][3]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>4</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 6%">
                    <table>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; ">
                                @if ($pdfDeatils['form']['blocs'][0]['lines'][23]['content']['data']['fields'][4]['value'] == 1)
                                    <div id="custom-checkbox-" class="custom-checkbox checked">
                                        <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                    </div>
                                @else
                                    <div id="custom-checkbox-" class="custom-checkbox">
                                        <span>&nbsp;</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>5</b></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 38%">Le ménage souhaite minimiser l’impact des travaux</td>
                <td style="width: 2%"></td>
            </tr>
        </table>
    </div>

    <div style="margin-bottom: -15px;">

        <table
            style="width: 100%;padding-bottom:0px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; padding-bottom:-10px;  ">
            <tr style="position: relative; top:10px;">
                <td style="width: 1%"></td>
                <td style="width: 69%">
                    <h4 style="position: relative; top:-10px;font-size:15px;"> Q10 : &nbsp;&nbsp;&nbsp;Pour financer
                        ses travaux, le ménage:</h4>
                </td>
                <td style="width: 15%;"></td>
                <td style="width: 15%; font-size:10px;text-align: right; ">
                    <p style="margin-right:5px;position: relative; top:-10px;color:rgb(80, 80, 80)"><i>choix
                            multiples</i></p>
                </td>
            </tr>
        </table>
        <span
            style="display: block; border-top: 1px solid black; position: relative;top:-25px; width:97.8%; left:6px; "></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:0px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][29]['content']['data']['fields'][0]['value'] == 1)
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
                                <span> Dispose de fonds propres ;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][29]['content']['data']['fields'][1]['value'] == 1)
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
                                <span>Est disposé à emprunter;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][29]['content']['data']['fields'][2]['value'] == 1)
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
                                <span>Ne peut pas financer le reste à charge des travaux.</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q11 : &nbsp;&nbsp;&nbsp; Si le ménage
            est en capacité de financer ses travaux, quel reste à charge maximum peut-il supporter? </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:0px;">
        <table style="margin-left:30px; margin-top:15px;width:100%">
            <tr>
                <td>
                    <table style="margin-bottom: 5px;width:100% ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][31]['content']['data']['fields'][0]['value'] == 1)
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
                                <span>Moins de 1 000,00 €</span>
                            </td>
                            <td style="width: 10%"></td>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][31]['content']['data']['fields'][1]['value'] == 1)
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
                                <span>Entre 10 000,00 € et 30 000,00 €</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; margin-top:15px; width:100%">
            <tr>
                <td>
                    <table style="margin-bottom: 5px ;width:100%">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][31]['content']['data']['fields'][2]['value'] == 1)
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
                                <span>Entre 1 000,00 € et 5 000,00 €</span>
                            </td>
                            {{-- <td style="width: 10%"></td> --}}
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][31]['content']['data']['fields'][3]['value'] == 1)
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
                                <span>Plus de 30 000,00 €</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;border-bottom: 8px solid #f1f1f1;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][31]['content']['data']['fields'][4]['value'] == 1)
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
                                <span>Entre 5 000,00 € et 10 000,00 €</span>
                            </td>

                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1;page-break-before: always; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q12 : &nbsp;&nbsp;&nbsp; Typologie de
            logements et bâti: </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:0px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Une maison individuelle; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;padding-bottom:5px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][1]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Un logement collectif; </p>
                </td>
            </tr>
        </table>
        <table style="width: 100%; margin-top:-30px;">
            <tr>
                <td style="width: 15%"></td>
                <td>
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][1]['ajout'][0]['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 85%">
                    <p> En copropriété. Préciser les coordonnées du syndic:</p>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top:-30px;">
            <tr>
                <td style="width: 15%"></td>
                <td style="width: 85%">
                    <p>{{ $pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][1]['ajout'][1]['fields'][0]['value'] }}
                    </p>
                </td>
            </tr>
        </table>


        <table style="width: 100%; margin-top:-30px;">
            <tr>
                <td style="width: 15%"></td>
                <td>
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][1]['ajout'][2]['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 85%">
                    <p> En monopropriété;</p>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top:-30px;">
            <tr>
                <td style="width: 15%"></td>
                <td>
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][1]['ajout'][3]['fields'][0]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 85%">
                    <p> Ne sait pas ;</p>
                </td>
            </tr>
        </table>
        </table>
    </div>
    {{-- {{dd($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][0]['value'])}} --}}
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][2]['value'] == 1)
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Autre, préciser: </p>
                </td>
                <td></td>
                <td> {{ $pdfDeatils['form']['blocs'][0]['lines'][33]['content']['data']['fields'][2]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q13 : &nbsp;&nbsp;&nbsp;Type de
            bâtiments: </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:0px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][35]['content']['data']['fields'][0]['value'] == 1)
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
                                <span> Pavillon;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][35]['content']['data']['fields'][1]['value'] == 1)
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
                                <span>Grand ensemble;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][35]['content']['data']['fields'][2]['value'] == 1)
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
                                <span>Maison de ville;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][35]['content']['data']['fields'][3]['value'] == 1)
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
                                <span>Petite immeuble de centre ancien;</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][35]['content']['data']['fields'][4]['value'] == 1)
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
                                <span>Haussmannien, faubourien, grand immeuble de centre ancien; </span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table width="100%" style="margin-left:30px; margin-top:15px;">
            <tr>
                <td width="100%">
                    <table style="margin-bottom: 5px ">
                        <tr>
                            <td style="vertical-align: middle;">

                                @if ($pdfDeatils['form']['blocs'][0]['lines'][35]['content']['data']['fields'][5]['value'] == 1)
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
                                <span>Maison rurale.</span>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q14 : &nbsp;&nbsp;&nbsp; Surface
            habitable du logement: </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div class="types_3"
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table>
            <tr>
                <td>
                    <p style="margin-left:30px;">
                        {{ $pdfDeatils['form']['blocs'][0]['lines'][37]['content']['data']['fields'][0]['value'] }}&nbsp;m2
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left: 25px;width:100%; padding:15px; padding-left:0%;padding-bottom:10px;">
            <tr>
                <td style="width: 1%"></td>
                <td style="width: 59%">Pour le nombre de pièces (hors pièces humides)</td>
                <td style="vertical-align: middle; ">

                    @if ($pdfDeatils['form']['blocs'][0]['lines'][38]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 4%">T1</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][38]['content']['data']['fields'][1]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 4%">T2</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][38]['content']['data']['fields'][2]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 4%">T3</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][38]['content']['data']['fields'][3]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 4%">T4</td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][38]['content']['data']['fields'][4]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 4%">T5</td>
                <td style="width: 20%"></td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q15 : &nbsp;&nbsp;&nbsp; travaux de gros
            entretiens sont nécessaires à court ou moyen terme (réfection de toiture, ravalement, rafraîchissement, fin
            de vie de la chaudière, etc.): </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][40]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][40]['content']['data']['fields'][1]['value'])
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
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][40]['content']['data']['fields'][2]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 20%">Ne sait pas</td>

                <td style="width: 60%"></td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;padding-bottom:10px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si oui ,préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][40]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q16 : &nbsp;&nbsp;&nbsp;Le ménage pense
            que le logement n'est pas adapté à ses besoins (taille, accessibilité, etc.):</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][42]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][42]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:20px;padding-bottom:10px;">
        <table style="margin-left:18px; ">
            <tr>
                <td></td>
                <td>Si oui ,préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][42]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q17 : &nbsp;&nbsp;&nbsp;Le ménage trouve
            son logement inconfortable (température, humidité, bruit, etc.) en été ou en hiver :</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>


    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][44]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][44]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;padding-bottom:10px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si oui ,préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][44]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q18 : &nbsp;&nbsp;&nbsp;Le ménage
            considère son logement en bon état général:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][46]['content']['data']['fields'][1]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][46]['content']['data']['fields'][0]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom: 8px solid #f1f1f1;padding-bottom:10px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si non ,préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][46]['content']['data']['fields'][1]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>


    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;page-break-before: always;">
        CONDITIONS D'EXISTENCE DU MÉNAGE </h4>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q19 : &nbsp;&nbsp;&nbsp;Connaissance
            d'ordre économique et social du ménage</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le ménage a des difficultés d’ordre économique et social</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][49]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][49]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si oui ,préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][49]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le ménage a des difficultés à régler des factures (d’énergie particulièrement)</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][50]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][50]['content']['data']['fields'][1]['value'])
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
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][50]['content']['data']['fields'][2]['value'])
                                <div id="custom-checkbox-" class="custom-checkbox checked">
                                    <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                </div>
                            @else
                                <div id="custom-checkbox-" class="custom-checkbox">
                                    <span>&nbsp;</span>
                                </div>
                            @endif
                        </td>
                        <td style="width: 20%">Ne sait pas</td>
                        <td style="width: 60%"></td>
                    </tr>
                </table>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;border-bottom:8px solid #f1f1f1;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le ménage bénéficie déjà d'un accompagnement social</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][51]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][51]['content']['data']['fields'][1]['value'])
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
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][51]['content']['data']['fields'][2]['value'])
                                <div id="custom-checkbox-" class="custom-checkbox checked">
                                    <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                </div>
                            @else
                                <div id="custom-checkbox-" class="custom-checkbox">
                                    <span>&nbsp;</span>
                                </div>
                            @endif
                        </td>
                        <td style="width: 20%">Ne sait pas</td>
                        <td style="width: 60%"></td>
                    </tr>
                </table>
            </tr>
        </table>
    </div>


    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q20 : &nbsp;&nbsp;&nbsp;Le ménage est en
            situation d'isolement social dont difficultés à utiliser les outils numériques (connexion Internet,
            autonomie démarches en ligne, etc.): </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>


    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:5px;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][53]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][53]['content']['data']['fields'][1]['value'])
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

                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][53]['content']['data']['fields'][2]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width: 20%">Ne sait pas</td>

                <td style="width: 60%"></td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q21 : &nbsp;&nbsp;&nbsp;Des occupants du
            logement rencontrent des difficultés particulières d’autonomie:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Difficultés pour accéder au logement</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][55]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][55]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td style="width: 67%">Préciser l’étage où se situe le logement et le nombre d'étages du logement :
                </td>
                <td style="width: 33%">
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][56]['content']['data']['fields'][0]['value'] }}/{{ $pdfDeatils['form']['blocs'][0]['lines'][56]['content']['data']['fields'][1]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Absence d'ascenseur ou ascenseur hors d’état de marche </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][57]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][57]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom:8px solid #f1f1f1;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Difficultés dans la réalisation des gestes quotidiens (toilette, repas, déplacement, etc.)</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][58]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][58]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;">
        ÉTAT DE L’ENVELOPPE ET DES SYSTÈMES </h4>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q22 : &nbsp;&nbsp;&nbsp;Disponibilité
            d'un DPE (ou audit énergétique antérieur) réalisé sur le logement:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>

                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][61]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][61]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:25px; ">
            <tr>
                <td></td>
                <td>Si oui, quelle étiquette a été attribuée au logement? Préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][61]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;border-bottom:8px solid #f1f1f1;">
        <table style="margin-left:18px;padding-top:25px; ">
            <tr>
                <td></td>
                <td>Date du DPE:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][62]['content']['data']['fields'][0]['value'] }}</td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; page-break-before: always;">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q23 : &nbsp;&nbsp;&nbsp;Système de
            chauffage du logement:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>


    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left:30px; ">
            <tr>
                <td>
                    <p> Le système de chauffage est : </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][64]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Installation individuelle; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][64]['content']['data']['fields'][1]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Installation collective; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][64]['content']['data']['fields'][2]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Gaz ; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][64]['content']['data']['fields'][3]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Électricité; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][64]['content']['data']['fields'][4]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Autres, préciser:
                        {{ $pdfDeatils['form']['blocs'][0]['lines'][64]['content']['data']['fields'][4]['ajout'][0]['fields'][0]['value'] }}
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le système de chauffage est absent dans certaines pièces de vie </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][66]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][66]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le ménage peut régler la température de chauffe de son logement (thermostat, robinet thermostatique,
                    etc.) </td>
            </tr>
            <tr>
                <table
                    style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%; padding-bottom:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][67]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][67]['content']['data']['fields'][1]['value'])
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

                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td>Si oui, préciser la température de consigne fixée:
                            {{ $pdfDeatils['form']['blocs'][0]['lines'][67]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                            °C</td>
                    </tr>
                </table>

            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le ménage a la possibilité d'automatiser la baisse de température sur certaines plages horaires
                </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][68]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][68]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q24 : &nbsp;&nbsp;&nbsp;Système de
            ventilation du logement:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Présence d’humidité et/ou de moisissure dans le logement </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            {{-- {{dd($pdfDeatils['form']['blocs'][0]['lines'][70])}} --}}
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][70]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][70]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le logement dispose de ventilation naturelle ou mécanique fonctionnelle en continu
                    (VMC en état de marche, bonnes prises d’air visibles basses et hautes, présence et état
                    d’aérateurs au-dessus des fenêtres ou intégrés aux fenêtres) </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][71]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][71]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Ces ventilations sont présentes dans toutes les pièces d’eau</td>
            </tr>
            <tr>
                <table
                    style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%;padding-bottom:5px;">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][72]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][72]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q25 : &nbsp;&nbsp;&nbsp;Confort d’été
            dans le logement:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>


    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le ménage a trop chaud en été dans le logement </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][74]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][74]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-bottom: 8px solid #f1f1f1;border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Présence d'une climatisation </td>
            </tr>
            <tr>
                <table
                    style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%;padding-bottom:5px;">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][75]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][75]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;">
        ÉTAT GÉNÉRAL DU BATIMENT</h4>

    <div style="margin-bottom: -15px;">

        <table
            style="width: 100%;padding-bottom:0px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; padding-bottom:-10px;  ">
            <tr style="position: relative; top:10px;">
                <td style="width: 1%"></td>
                <td style="width: 69%">
                    <h4 style="position: relative; top:-10px;font-size:15px;"> Q26 : &nbsp;&nbsp;&nbsp;Présence de
                        fissure, de déformation ou d'effondrement:</h4>
                </td>
                <td style="width: 15%;"></td>
                <td style="width: 15%; font-size:10px;text-align: right; ">
                    <p style="margin-right:5px;position: relative; top:-10px;color:rgb(80, 80, 80)"><i>choix
                            multiples</i></p>
                </td>
            </tr>
        </table>
        <span
            style="display: block; border-top: 1px solid black; position: relative;top:-25px; width:97.8%; left:6px; "></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:5px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][78]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Mur </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][78]['content']['data']['fields'][1]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Toit ; </p>
                </td>
            </tr>
        </table>
    </div>
    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][78]['content']['data']['fields'][2]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Sol; </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][78]['content']['data']['fields'][3]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p>Autres, préciser:
                        {{ $pdfDeatils['form']['blocs'][0]['lines'][78]['content']['data']['fields'][3]['ajout'][0]['fields'][0]['value'] }}
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td>
                    <p>Depuis combien de temps sont apparus ces désordres?
                        {{ $pdfDeatils['form']['blocs'][0]['lines'][79]['content']['data']['fields'][0]['value'] }}
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td>
                    <p> Si copropriété localisation </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][80]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Partie commune </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-bottom: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:10px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][80]['content']['data']['fields'][1]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Partie privative </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1;page-break-before: always; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q27 : &nbsp;&nbsp;&nbsp;Risque de
            chutes d’éléments (briques, gouttières, cheminée, antenne, volets, etc.)?</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][82]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][82]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom: 8px solid #f1f1f1;padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si oui ,préciser:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][82]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q28 : &nbsp;&nbsp;&nbsp;Infiltrations
            d'eau (défaut d'étanchéité, remontées depuis le sol, fuite de canalisations, etc.)?</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%;">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][84]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][84]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si oui, préciser la localisation et
                    origine:{{ $pdfDeatils['form']['blocs'][0]['lines'][84]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left:30px; ">
            <tr>
                <td>
                    <p> Si copropriété localisation </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][85]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Partie commune </p>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;border-bottom: 8px solid #f1f1f1;">
        <table style="margin-left:30px; ">
            <tr>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][85]['content']['data']['fields'][1]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                <td>
                    <p> Partie privative </p>
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q29 : &nbsp;&nbsp;&nbsp; Les
            menuiseries présentent-elles des dysfonctionnements?</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Défaut d’étanchéité (absence de joints ou en mauvais état, vitres cassées, etc.) </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][87]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][87]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Difficulté pour les fermer ou les ouvrir </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][88]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][88]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;border-bottom: 8px solid #f1f1f1; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Présence de grilles de ventilation</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][89]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][89]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;">
        CONDITIONS SANITAIRES ET D'UTILISATION DU LOGEMENT </h4>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q30 : &nbsp;&nbsp;&nbsp;Pièces de vie
            du logement:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Certaines pièces de vie du logement sont situées en sous-sol</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][92]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][92]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Préciser lesquelles
                    :{{ $pdfDeatils['form']['blocs'][0]['lines'][92]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Certaines pièces de vie ne disposent pas d'une fenêtre permettant un éclairage naturel
                    par temps clair</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][93]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][93]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Préciser lesquelles
                    :{{ $pdfDeatils['form']['blocs'][0]['lines'][93]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Certaines pièces de vie n'ont pas une hauteur de plafonds minimum de 2,20 m</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][94]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][94]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;border-bottom: 8px solid #f1f1f1;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Préciser lesquelles
                    :{{ $pdfDeatils['form']['blocs'][0]['lines'][94]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; page-break-before: always;">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q31 : &nbsp;&nbsp;&nbsp;Accès à l'eau:
        </h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Accès à l’eau potable à l’intérieur du logement</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][96]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][96]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Si non,
                    préciser:{{ $pdfDeatils['form']['blocs'][0]['lines'][96]['content']['data']['fields'][1]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom : 8px solid #E7E8E8;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Accès à l'eau chaude sanitaire </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][97]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][97]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q32 : &nbsp;&nbsp;&nbsp;Présence de
            nuisibles (cafards, rongeurs, punaises de lit, etc.) au domicile:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">

            <tr>

                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][99]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][99]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:30px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Préciser:{{ $pdfDeatils['form']['blocs'][0]['lines'][99]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q33 : &nbsp;&nbsp;&nbsp;Présence d’un
            WC et d’une salle d’eau à l’intérieur du logement?</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">

            <tr>

                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][101]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][101]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:30px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Préciser:{{ $pdfDeatils['form']['blocs'][0]['lines'][101]['content']['data']['fields'][1]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q34 : &nbsp;&nbsp;&nbsp;Les
            canalisations sont fréquemment bouchées ou les WC très dégradés?</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">

            <tr>

                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][103]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][103]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:30px; padding-bottom:15px;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
                <td>Préciser:{{ $pdfDeatils['form']['blocs'][0]['lines'][103]['content']['data']['fields'][0]['ajout'][0]['fields'][0]['value'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q35 : &nbsp;&nbsp;&nbsp;L’entretien du
            logement et/ou des parties communes est-il suffisant (propreté, encombrement, etc.)?</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">

            <tr>

                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][105]['content']['data']['fields'][0]['value'])
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
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][105]['content']['data']['fields'][1]['value'])
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

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:30px; padding-bottom:15px;border-bottom: 8px solid #E7E8E8;">
        <table style="margin-left:18px;padding-top:10px; ">
            <tr>
                <td></td>
              
                <td>Préciser:  @if (isset($pdfDeatils['form']['blocs'][0]['lines'][105]['content']['data']['fields'][1]['ajout'][0]['fields'][0]['value']))
                                    {{ $pdfDeatils['form']['blocs'][0]['lines'][105]['content']['data']['fields'][1]['ajout'][0]['fields'][0]['value'] }}
                                @endif
                </td>
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q36 : &nbsp;&nbsp;&nbsp;Existence de
            diagnostic sur le logement:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>


    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%">
            <tr>
                <td style="width: 20%">Amiante </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][107]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][107]['content']['data']['fields'][1]['value'])
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
                <td style="width: 60%">Points de vigilance:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][108]['content']['data']['fields'][0]['value'] }}</td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%">
            <tr>
                <td style="width: 20%">Plomb </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][109]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][109]['content']['data']['fields'][1]['value'])
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
                <td style="width: 60%">Points de vigilance:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][110]['content']['data']['fields'][0]['value'] }} </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%">
            <tr>
                <td style="width: 20%">Risques naturels </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][111]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][111]['content']['data']['fields'][1]['value'])
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
                <td style="width: 60%">Points de vigilance:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][112]['content']['data']['fields'][0]['value'] }} </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%">
            <tr>
                <td style="width: 20%">Radon </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][113]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][113]['content']['data']['fields'][1]['value'])
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
                <td style="width: 60%">Points de vigilance:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][114]['content']['data']['fields'][0]['value'] }} </td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%">
            <tr>
                <td style="width: 20%">Termites </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][115]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][115]['content']['data']['fields'][1]['value'])
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
                <td style="width: 60%">Points de vigilance:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][116]['content']['data']['fields'][0]['value'] }}</td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px; border-bottom: 8px solid #f1f1f1;padding-bottom:10px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%">
            <tr>
                <td style="width: 20%">Mérule </td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][117]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][117]['content']['data']['fields'][1]['value'])
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
                <td style="width: 60%">Points de vigilance:
                    {{ $pdfDeatils['form']['blocs'][0]['lines'][118]['content']['data']['fields'][0]['value'] }} </td>
            </tr>
        </table>
    </div>

    <h4
        style="background-color: #f1f1f1; padding: 0.5px; margin-bottom: 0px; margin-top: 20px;padding:10px;padding-left:20px;font-size:15px;page-break-before: always;">
        SÉCURITÉ DES PERSONNES DANS LE LOGEMENT </h4>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q37 : &nbsp;&nbsp;&nbsp;Risque
            incendie, fumées et monoxyde de carbone:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Le logement est équipé de détecteurs avertisseurs autonomes de fumée </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][121]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][121]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Des raccordements (alimentation et évacuation) d’appareils à gaz sont inadéquats (tuyaux de gaz
                    périmés), chaudière non entretenue </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][122]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][122]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Des chauffages d’appoint sont utilisés </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][123]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][123]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q38 : &nbsp;&nbsp;&nbsp;Accès et
            évacuations:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Accessibilité difficile aux dispositifs et engins de secours </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][125]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][125]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom: 8px solid #f1f1f1;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Évacuation complexe (une seule sortie, étroite, non protégée, pas de fenêtres, etc.)</td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][126]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][126]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q39 : &nbsp;&nbsp;&nbsp;Risque
            électrique:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 50%">L’électricité se coupe fréquemment</td>
                <td style="width: 20%"></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][128]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][128]['content']['data']['fields'][1]['value'])
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
                <td style="width: 10%"></td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 50%">Présence d'un dispositif de coupure générale à l’intérieur du logement </td>
                <td style="width: 20%"></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][129]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][129]['content']['data']['fields'][1]['value'])
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
                <td style="width: 10%"></td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 50%">Installation électrique dans toutes les pièces</td>
                <td style="width: 20%"></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][130]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][130]['content']['data']['fields'][1]['value'])
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
                <td style="width: 10%"></td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 50%">Présence de fils apparents dénudés</td>
                <td style="width: 20%"></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][131]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][131]['content']['data']['fields'][1]['value'])
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
                <td style="width: 10%"></td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 50%">Présence disjoncteur avec différentiel</td>
                <td style="width: 20%"></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][132]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][132]['content']['data']['fields'][1]['value'])
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
                <td style="width: 10%"></td>
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:25px; padding-bottom:10px;">
        <table style="padding-top:20px; margin-left:20px ;width:100%;">
            <tr>
                <td style="width: 50%">Insuffisance du nombre de prises électriques</td>
                <td style="width: 20%"></td>
                <td style="vertical-align: middle; ">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][133]['content']['data']['fields'][0]['value'])
                        <div id="custom-checkbox-" class="custom-checkbox checked">
                            <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                        </div>
                    @else
                        <div id="custom-checkbox-" class="custom-checkbox">
                            <span>&nbsp;</span>
                        </div>
                    @endif
                </td>
                <td style="width:10% ">Oui</td>
                <td style="vertical-align: middle;">
                    @if ($pdfDeatils['form']['blocs'][0]['lines'][133]['content']['data']['fields'][1]['value'])
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
                <td style="width: 10%"></td>

            </tr>
        </table>
    </div>

    <div class="type_5"
        style="padding-bottom:5px; border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1;border-top: 8px solid #f1f1f1; ">
        <h4 style="position: relative;  left:10px; top:-10px;font-size:15px;"> Q40 : &nbsp;&nbsp;&nbsp;Risque pour les
            personnes:</h4>
        <span style="display: block; border-top: 1px solid black; position: relative;top:-18px;"></span>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; ">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Les escaliers sont-ils en mauvais état / déformés / dangereux / avec risques de chutes </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][135]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][135]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    <div
        style="border-left: 8px solid #f1f1f1;border-right: 8px solid #f1f1f1; margin:0; margin-top: -38px; padding-top:15px; border-bottom: 8px solid #f1f1f1;">
        <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-bottom:0%;">
            <tr>
                <td>Présence de rampe / garde-corps </td>
            </tr>
            <tr>
                <table style="margin-left: 20px;width:100%; padding:15px; padding-left:0%; padding-top:0%">
                    <tr>
                        <td style="vertical-align: middle; ">
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][136]['content']['data']['fields'][0]['value'])
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
                            @if ($pdfDeatils['form']['blocs'][0]['lines'][136]['content']['data']['fields'][1]['value'])
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
            </tr>
        </table>
    </div>

    {{-- @php
            $companyginTop = $bloc['lines']['0']['type'] == 5 ? '0px' : '0px';
        @endphp
        <div style="width: 100%;">
            @php
                $key = 0;
            @endphp
            @foreach ($bloc['lines'] as $line)
                @if ($line['type'] == 1)
                    @include('forms.form_types.type_1')
                    @php
                        $key++;
                    @endphp
                @endif
                @if ($line['type'] == 3)
                    @include('forms.form_types.type_3')
                    @php
                        $key++;
                    @endphp
                @endif
                @if ($line['type'] == 4)
                    @include('forms.form_types.type_4')
                    @php
                        $key++;
                    @endphp
                @endif

                @if ($line['type'] == 9)
                    @include('forms.form_types.type_9')
                    @php
                        $key++;
                    @endphp
                @endif
                @if ($line['type'] == 5)
                    @include('forms.form_types.type_5')
                @endif
                @if ($line['type'] == 10)
                    @include('forms.form_types.type_10')
                @endif
                @if ($line['type'] == 8)
                    @include('forms.form_types.type_8')
                @endif
                @if ($line['empty_table'] == 1)
                    <table width="100%" style="background-color: white;">
                        <tr>

                        </tr>
                    </table>
                @endif
                @if ($line['break_page_after'] == 1)
                    <div style="page-break-after: always;">
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach --}}
    {{-- @include('rapport.shared.conclusion', $pdfDeatils) --}}



</body>

</html>
