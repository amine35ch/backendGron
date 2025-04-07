<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat</title>
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

        p {
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
            font-size: 12px;
            color: #032d87;
        }

        .with-border {
            border: 1px solid black";

        }

        .tick {
            list-style: none;
        }

        .tick li:before {
            content: '✓';
        }

        .line {
            list-style: none;
        }

        .line li:before {
            content: '-';
        }

        .line li {
            font-size: 11px;
        }

        span {
            font-size: 11px;
        }

        @page {
            margin-top: 10;
            margin-bottom: 10;
            margin-left: 25;
            margin-right: 25;
        }
    </style>
</head>

<body>




    <div style="">
        <table style="width: 100%">
            <tr>
                <td style="width:80%;text-align:center;">
                    <h2 style="color:#4472c4;">
                        <span style="font-size: 18.5px;">Document informations générales préalables</span><br>
                        <span style="font-size: 18.5px;">Présentation de la mission d’accompagnateur rénov</span>
                    </h2>
                </td>
            </tr>
        </table>
    </div>
    @foreach ($data as $bloc)
        @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @endif
            </div>
        @endforeach
    @endforeach
    <div>
        <table style="width:100%;border-collapse:collapse;border:1px solid black;page-break-inside: avoid;">
            <tr class="with-border">
                @php
                     $signatureDate=\Carbon\Carbon::parse($project?->visits->where('type',0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y');
                @endphp
                <td class="with-border" style="vertical-align: top">
                    <span style="margin-left:10px;">Fait à :<span class="{faitA}"> {{ $project->client->city }}
                        </span></span>
                    <br>
                    <span style="margin-left:10px;">Le <span class="{date}"> {{ $signatureDate }} </span></span>
                    <br>
                    <span style="margin-left:10px;">Signature de l’acompganateur Rénov </span>
                    <br>
                    @if ($project->company->signature)
                        <img src="{{ storage_path('app/' . $project->company->signature) }}"
                            style="width: 100px;height:auto;margin-left:100px;margin-top:10px;" alt="">
                    @else
                        <section style="height:70px;"></section>
                    @endif

                </td>
                <td class="with-border" style="vertical-align: top">
                    <span style="position: relative;top:-5px;margin-left:10px;">Signature du Bénéficiaire</span>
                    <br>
                    <section style="height:65px;"></section>
                    <br>
                    <span style="margin-left:10px;">Nom:</span> <span
                        class="{last_name}">{{ $project->client->last_name }}</span>
                    <br>
                    <span style="margin-left:10px;">Prénom: </span>
                    <span class="{first_name}">{{ $project->client->first_name }}</span>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
