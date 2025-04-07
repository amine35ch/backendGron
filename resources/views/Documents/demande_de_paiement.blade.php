<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ATTESTATION DE TRAVAUX
        DEMANDE DE PAIEMENT DE PRIME</title>
</head>
<style>
    @page{
        margin-top:50px;
        margin-bottom:50px;
        margin-right: 60px;
        margin-left:60px;
    }
    .title {
            color: #000000;
            font-weight: bold;
            margin-bottom: 40px;
            padding-left: 30px;
            padding-right: 30px;
            font-family: Tahoma, "Trebuchet MS", sans-serif;
        }
    .tahoma{
        font-family: Tahoma, "Trebuchet MS", sans-serif;
    }
    body {
        font-family: Verdana, sans-serif;
    }
    p{
        font-size: 14px;
    }

</style>
<body>

        <div style=" width: 100%; position:relative; top:-30px;">
            <table style="width: 100%">
                <td ><img style="height: 110px;" src="{{ resource_path('images/republic-fr.png') }}" alt="repFrancaise"></td>
                <td style="width: 70%"></td>
                <td><img style="height: 110px" src="{{ resource_path('images/agence-nationale.png') }}" alt="agenceNationale"></td>
            </table>
        </div>
        <div>
            <p style="font-size:10px;margin-bottom:5px;text-align:center;position:relative;top:50px;z-index:99;">MaPrimeRénov' - Forfait rénovation globale et / ou bonus de performance énergétique</p>
            <h3  class="title" style="background-color:#ededed;text-align:center;padding:15px;padding-top:35px;padding-bottom:35px; ">

                        ATTESTATION DE TRAVAUX <br>
                        DEMANDE DE PAIEMENT DE PRIME
            </h3>
            <p style="font-size:10px;margin-bottom:5px;text-align:center;position:relative;top:-70px;z-index:99;">
            Applicable à compter du 1er avril 2023
        </p>
    </div>

    @foreach ($data as $bloc)
    @foreach ($bloc['fields'] as $field)
        <div>
            @if ($field['title'])
                <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
            @endif
            @if ($field['type'] == 'text')
                {!! $field['data'] !!}
            @elseif ($field['type'] == 'nature')
            @foreach ($project->works as $key =>$work)

            <div style="border:8px solid #ededed;margin-top:20px;page-break-inside:avoid;">
                <p style="font-size:16px;text-align:center;background-color:#ededed;padding:15px;margin-top:-5px;font-weight:bold;" class="tahoma">
                    {{$key+1}}. Nature des travaux réalisés<sup>7</sup> :
                </p>
                <p class="margin:15px;font-size:15px;">
                    &nbsp;&nbsp;&nbsp;{{$work->entitled}}
                </p>

                <p style="font-weight: bold;margin:15px;" class="tahoma">
                    Coût total éligible revenant au logement = {{round($work->cost_invoice_ttc,2)}} € TTC
                </p>
                <p style="padding-bottom:60px;margin:15px;margin-top:-12px;">
                    Nom de l’entreprise : {{$work->installateur?->trade_name}} <br>
                    N° SIRET : {{$work->installateur?->siret}} <br>
                    Fait à : {{$work->installateur?->city}} le: {{now()->format('d/m/Y')}} <br>
                    Signature :
                </p>
            </div>

            @endforeach
            @endif
        </div>
    @endforeach
@endforeach

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
            if ($PAGE_COUNT > 1) {
                $x1 = $pdf->get_width() - 50;
                $y1= $pdf->get_height() - 50;
                $font = $fontMetrics->get_font("helvetica", "normal");
                $size = 7;
                $pageText1="$PAGE_NUM/$PAGE_COUNT";
                $pdf->text($x1, $y1,$pageText1 , $font, $size);
            }
        ');
    }
    </script>
</body>
</html>
