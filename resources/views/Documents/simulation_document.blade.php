<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simulation</title>
</head>
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
        @page{
            margin-top: 20;
            margin-bottom: 15;
            margin-left: 60;
            margin-right: 60;
        }

</style>
<body>

    <div>
        <img src="{{resource_path('images/logo-mar.png')}}" alt="" style="height: 100px;">
        <h2 style=" position: relative;top:-50px;text-align:center;color:#86A039; ">Résultat de simulation</h2>
    </div>

    @if(isset($data))
        @foreach ($data as $bloc)
            @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @elseif ($field['type'] == 'scenario')
                <div style="margin-top:-10px;page-break-before:always;">
                    <h3 style="background-color: #86A039; color: white; padding: 10px; border-radius: 10px;">
                        Scénario Retenu:
                    </h3>
                    <p style="text-align: center;">
                        {{ $project->scenario }}
                    </p>
                    @php
                    $operationPerUnit = $project->works;
                    $perQuantity = $operationPerUnit->where('unit', null);
                    $perUnit = $operationPerUnit->reject(function ($work) {
                        return $work->unit === null;
                    });
                    @endphp
                        <table style=";margin-left:40px;width: 90%;margin-top:-25px;">
                            <tr>
                                    <td style="width: 100%"> <h4 >{{$project->scenarioType?->entitled}}</h4></td>

                                </tr>
                            </table>

                        <table style="text-align:center;margin-left:40px;width: 90%;border-collapse:collapse;border:1px solid rgb(243, 243, 243)">

                            <tr>
                                <td style="width: 25%;color:#86A039"><b>Travaux/Equipement</b></td>
                                <td style="width: 25%;color:#86A039"><b>Surface(m<sup>2</sup>)/Quantité</b></td>
                                <td style="width: 25%;color:#86A039"><b>Prix Unitaire</b></td>
                                <td style="width: 25%;color:#86A039"><b>Montant TTC</b></td>
                            </tr>
                        </table>
                        @foreach ($project->works as $work)

                        <table style="text-align:center;margin-left:40px;width: 90%;border-collapse:collapse;border:1px solid rgb(243, 243, 243)">
                            <tr>
                                    <td style="width: 25%;text-align:left;padding-left:10px;"><b>{{$work?->entitled}}</b></td>
                                    <td style="width: 25%;padding-left:20px;color:#6c6c6c;"> {{$work?->qty_simulation}} </td>
                                    <td style="width: 25%;text-align:left;text-align:center;"><b>{{number_format(round($work?->price_unit_ht_simulation, 2), 2, ',', ' ')}}</b></td>
                                    <td style="width: 25%;text-align:left;text-align:center;"><b>{{number_format(round($work?->cost_ttc_simulation, 2), 2, ',', ' ')}}</b></td>
                                </tr>
                            </table>

                        @endforeach
                @endif
            </div>
            @endforeach
        @endforeach


    @endif
            @php

                $montantTva=$project->cost_ttc_simulation-$project->cost_ht_simulation;
                $montantAide=$project->cost_ttc_simulation - $project->rest_ttc_simulation;
            @endphp
    <div style="page-break-inside: avoid; margin-top:35px;">
        <table style="width: 100%;  border:solid 1px #e3e1dd; border-radius:10px; padding:10px;background-color:#f9f6ee;">
            <tr>
                <td rowspan="6" style="width: 35%;"><img src="{{resource_path('images/logo-mar.png')}}" style="width: 110px;height:auto;"></td>
                <td style="width: 35%;">Coût des travaux HT :</td>
                <td style="width: 30%; text-align:right"><span class="{total_ht}">{{number_format(round($project->cost_ht_simulation, 2), 2, ',', ' ')}}</span> €</td>
            </tr>
            <tr>
                <td style="">Montant TVA :</td><td style=" text-align:right"><span class="{montant_aide}">{{number_format(round($montantTva, 2), 2, ',', ' ')}}</span> €</td>
            </tr>
            <tr>
                <td style="">Montant TTC :</td><td style=" text-align:right"><span class="{montant_aide}">{{number_format(round($project->cost_ttc_simulation, 2), 2, ',', ' ')}}</span> €</td>
            </tr>
            <tr>
                <td style="">Montant d'aide :</td><td style=" text-align:right"><span class="{mar_fund}">{{number_format(round($montantAide, 2), 2, ',', ' ')}}</span> €</td>
            </tr>
            <tr>
                <td style="olor:red;">Reste à charge TTC :</td> c
                <td style=" color:red; text-align:right"><span class="{rest_charge}"></span> {{number_format(round($project->rest_ttc_simulation, 2), 2, ',', ' ')}} €</td>
            </tr>
        </table>
    </div>
    </body>

</html>
