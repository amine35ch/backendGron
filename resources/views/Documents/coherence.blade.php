<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cohérence des travaux
        Prise en main du logement après travaux</title>
</head>
<style>
      body{
        font-family:"Calibri", sans-serif;
        }
        .with-border {
           border:1px solid black;

        }
        p{
            font-size: 11px
        }
        span{
            font-size:12px;
        }
</style>
<body>
    <div>
        <p style="text-align:center;font-size:24px;color:#4472c4">
            Cohérence des travaux <br>
            Prise en main du logement après travaux
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
            @endif
        </div>
    @endforeach
@endforeach

    {{--
        <div>
            <table style="width:100%; border-collapse:collapse; border:1px solid black;">
                <tr class="with-border">
                    <td class="with-border" style="padding-left:10px;">
                        <p style="color:#4472c4;position:relative;bottom:1.2%;font-size:13px; ">
                            <strong>Date de la réunion :</strong>
                        </p>
                    </td>
                <td style="padding-left:10px;vertical-align: top;" class="with-border">
                    <span style=""><span class="{date}"></span></span>
                </td>
                </tr>
                <tr class="with-border">
                    <td style="padding-left:10px">
                        <span style="color:#4472c4;position:relative;bottom:2%;font-size:13px; "><strong>Emetteur :</strong></span>
                    </td>
                    <td style="padding-left:10px" class="with-border"><span class="{mar_name}">
                        </span> <br><span style="">SIRET :<span class="{mar_siret}"></span> <span class="{mar_adress}"></span></span><br><span style="">Numéro d’Agrément Mon Accompagnateur Rénov : <span class="{mar_approval_number}"></span></span>
                    </td>
                </tr>
                <tr class="with-border">
                    <td style="padding-left:10px" class="with-border">
                        <span style="color:#4472c4;position:relative;bottom:1%;font-size:13px;"><strong>Bénéficiaire :</strong></span>
                    </td>
                    <td style="padding-left:10px" class="with-border">
                        <span style="">Nom Prénom <span class="{last_name}"></span>  <span class="{first_name}"></span></span> <br><span style="">Adresse :<span class="{client_address}"></span></span>
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 10px;">
            <p style="font-size: 14px;">
            La cohérence des travaux entre les travaux réalisés et le scénario de travaux prévu a bien été vérifié ce jour en présence du
            bénéficiaire et de l’accompagnateur rénov. </p>
        <p style="font-size: 14px;">
            Le bénéficiaire a été accompagner ce jour pour la prise en main du logement après travaux.
        </p>
        </div> --}}
        {{-- <div style="position:relative;top:5%;">
            <table style="width:100%; border-collapse:collapse; border:1px black;">
                <tr class="with-border">
                    <td style="padding-left:10px" class="with-border">
                        <table>
                            <tr>
                                <td>
                                    <span style="padding-left:10px">Fait à <span class="{mar_city}"></span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="padding-left:10px">Le</span> <span class="{date}"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="padding-left:10px">Signature pour l’accompagnateur Rénov </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;height:50px;">

                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding-left:10px" class="with-border">
                        <table>
                            <tr>
                                <td>
                                    <span style="padding-left:10px">Signature pour le Bénéficiaire </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center;height:50px;">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="padding-left:10px">Nom <span class="{last_name}"></span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="padding-left:10px">Prénom</span> <span class="{first_name}"></span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div> --}}

</body>
</html>
