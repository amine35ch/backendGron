<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation de travaux</title>
    <style>
        @font-face {
            font-family: DejaVu Sans, 'Cambria', sans-serif !important;
            src: url('/fonts/Cambria.ttf') format('truetype');
        }

        body {
            font-family: DejaVu Sans, 'Cambria', sans-serif !important;
            src: url('/fonts/Cambria.ttf') format('truetype');
            font-size: 13px
        }

        footer {
            position: fixed;
            bottom: -43px;
            left: -31;
            right: -50px;
            height: 50px;
            text-align: center;
            font-size: 9px;
            color: rgb(68, 67, 67);

        }

        .td-style {
            text-align: center;
            vertical-align: middle;
        }

        .td-style-left {
            text-align: left;
            vertical-align: middle;
        }

        table {
            page-break-inside: auto
        }
        p{
            font-size: 12px;
        }

        * {
            widows: 1;
            orphans: 1;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 48%;
            transform: translate(10%, 25%);
            z-index: 1;
        }

        .text span {
            font-size: 9px;
            font-weight: bold;
            color: white;
            text-align: center;
        }

        .vertical-text-left {
            transform: rotate(-180deg);
            position: absolute;
            right: -35;
            top: 35%;
        }

        .card {
            position: absolute;
            left: 84%;
            top: -40;
        }

        .name_card {
            position: absolute;
            right: 60%;
            top: -40;
            font-size:12px;
            color : #032d87;
        }
        .with-border {
           border:1px solid black";
           padding:3px
        }
        .tick{
            list-style: none;
        }
        .tick li:before {
            content: '✓';
        }
        .line{
            list-style: none;
        }
        .line li:before {
            content: '-';
        }

        @page {
            margin-top: 90;
            margin-bottom: 50;
            margin-left: 30;
            margin-right: 30;
        }
    </style>
</head>

<body>

    <div style="margin-top:-12%">
        <table style="width: 100%; margin-bottom: 1%">
            <tr>
                <!-- Left Image -->
                <td style="width: 50%; text-align: left;">
                    <img style="width: 30%; display: block; margin: 0 auto;" src="{{ resource_path('images/republic-fr.png') }}" />
                </td>

                <!-- Right Image -->
                <td style="width: 50%; text-align: right;">
                    <img style="width: 30%; display: block; margin: 0 auto;" src="{{ resource_path('images/agence-nationale.png') }}" />
                </td>
            </tr>
        </table>
        <div>
            <table style="width: 100%; border-collapse: collapse;">

                <tr>
                    <td style="text-align: center;background-color:rgb(240, 240, 240)" >

                        <p >MaPrimeRénov' – Parcours accompagné</p>
                        <p > <strong>ATTESTATION DE TRAVAUX (factures)</strong></p>
                        <p >Applicable à compter du 1er janvier 2024</p>

                    </td>

                </tr>
            </table>
        </div>

    </div>
    @foreach ($data as $bloc)
            @if ($bloc['title'])
                    <h4 style="{{ $bloc['style'] }}">{{ $bloc['title'] }}</h4>
                @endif
        @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if($field['type']=='operations')
                    <div style="page-break-inside:avoid">

                        <table border="1" cellspacing="0" cellpadding="0"
                        style="width:100%;page-break-inside:avoid">
                            <tbody>

                                <tr>
                                    <td style="width:20%">
                                        <p align="center" >
                                            <strong>Description des postes de travaux éligibles </strong>
                                            <br/>
                                            (dont travaux induits)
                                        </p>
                                    </td>
                                    <td style="width:20%">
                                        <p align="center" >
                                            <strong>Coût des travaux en € HT / € TTC </strong>
                                            <br/>
                                            (à partir des factures des entreprises)
                                        </p>
                                    </td>
                                </tr>
                                @foreach ($project->works as $line)
                                    <tr>
                                        <td style="width:20%">
                                            <p align="center" style="font-size:12px">
                                                    {{$line->work->reference }}
                                            </p>
                                        </td>
                                        <td style="width:20%">
                                            <p align="center" style="font-size:12px;padding:3px">
                                                {{ round($line->cost_invoice_ht,2)  }} € / {{ round($line->cost_invoice_ttc,2)  }} €
                                            </p>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @elseif($field['type']=='derogation')
                <div>
                     <table border="1" cellspacing="0" cellpadding="0" style="width: 100%;text-align:center;">
                         <thead>
                             <td style="text-align:center;padding:3px" >
                                <strong style="font-size:11px">Paroi opaque ou vitrée concernée</strong>
                            </td>
                            <td>
                                <strong style="font-size:11px">Motif</strong>
                                (description de la contrainte technique, architecturale ou patrimoniale)
                            </td>
                        </thead>
                        <tbody>
                            @if ($project->derogation_request_criteria)

                                @foreach ($project->derogation_request_criteria as $derogation)
                                <tr style="height: 200px">
                                    <td> {{$derogation['paroi']}} </td>
                                    <td>{{$derogation['motif']}}</td>
                                </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @endif

            </div>
        @endforeach
    @endforeach
</body>
</html>
