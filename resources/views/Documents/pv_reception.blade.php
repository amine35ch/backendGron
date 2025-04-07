<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pv reception</title>
</head>
<style>
      body {
            font-family: DejaVu Sans, 'Calibri', sans-serif !important;
        }
    .franklin{
        font-family:"Franklin Gothic Medium" !important;
        color: white;
        text-align: center;
        margin-top:80px;
    }
    .franklin p{
        font-size: 20px;
        font-weight: bold;
    }
    p{
        font-size:13px;
    }
    .green-block{
        background-color: #90ce4e;
        color: white;
        padding: 13px;
        margin: 9px;
        width: 120%;
        position: absolute;
        z-index: 99;
    }
    .bleu-block{
        background-color: #001e5e;
        height: 55%;
        width: 200%;
        position: absolute;
        left:-10%;
        top:24%
    }
    .title{
        background-color: #90ce4e;
        color: white;
        font-size: 17px;
        font-weight: bold;

    }
    .dotted-line{
        border-bottom: dotted 1px;
        margin-top: 30px;
    }
    @page{
        margin-left:60px;
        margin-right:60px;
    }
</style>
<body>
    @foreach ($data as $bloc)
    @foreach ($bloc['fields'] as $field)
        <div>
            @if ($field['title'])
                <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
            @endif
            @if ($field['type'] == 'text')
                {!! $field['data'] !!}
            @endif
            @endforeach
@endforeach


    {{-- <div>
        <img src="{{public_path('images/agence-nationale.png')}}" alt="" style="width: 160px;height:110;">
        <p>
            <b>
                Accompagnateur Rénov : <span class="{mar_name}"></span><br>
                Raison sociale : <span class="{mar_name}"></span><br>
                SIRET : <span class="{mar_siret}"></span>
            </b>
        </p>
    </div>
    <div>
        <section class="green-block"></section>
        <section class="bleu-block"></section>
    </div>
    <div class="franklin">
        <p style="border-bottom: 1px solid #5061d4">Nom du client : <span class="{client_name}"></span></p>
        <p>Téléphone du client : <span class="{tel_client}"></span></p>
        <p>Adresse du projet : <span class="{address_project}"></span></p>
        <p>Code postal et ville : <span class="{zip_city_project}"></span></p>
        <p style="border-bottom: 1px solid #5061d4">PV de réception : <span class="{pv_reception}"></span> </p>
    </div>
    <div style="text-align: center;margin-top:300px;">
        <img src="{{public_path('images/logo_MAR1.jpg')}}" alt="" style="width: 180px;height:120px;">
    </div>
    <div style="page-break-before: always;text-align:center;margin-top:30px;"  >
        <span class="title">PROCES‐VERBAL DE RECEPTION ET DE CONTROLE DES TRAVAUX</span>
    </div>
    <div style="margin-top:50px;">
        <p style="font-size:11px;">
            Je soussigne, Madame/Monsieur <span class="{client_name}"></span> <br>
           <b> Agissant en qualité d’Accompagnateur Rénov  </b><br>
            Après avoir procédé à la visite destravaux exécutées par l’entreprise d’installation <span class="{installer_name}"></span> <br>
            Au titre du devis n° <span class="{devis_ref}"></span>. En date du <span class="{date_devis}"></span> <br>
        </p>
        <p style="font-size:11px;">
            A l’adresse <span class="{address_project}"></span>.
        </p>

    </div>
    <div>
        <p style="font-size: 11px;font-weight:bold">Relatif à des travaux de :</p>
        <ul style="list-style: none">
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{ITI}"> Isolation des murs par intérieur ITI avec <b>R ≥ 3,7 m2. K/W</b>
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{ITE}"> Isolation des murs par Extérieur ITE avec <b>R ≥ 4,4 m2. K/W</b>
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{combles}"> Isolation Planchers de combles perdus avec <b>R ≥ 7 m2. K/W</b>
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{bas}">  Isolation des planchers bas avec <b>R ≥ 3 m2. K/W</b>
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{toitures}"> Isolation toitures terrasses avec <b>R ≥ 6,5 m². K/W</b>
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{rampants}"> Isolation des rampants avec <b>R ≥ 6 m². K/W</b>
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{air/air}"> PAC air/air
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{air/eau}"> PAC air/eau
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{VMC}"> Ventilation mécanique Contrôlée (VMC)
            </li>
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="{thermodynamique}"> Ballon thermodynamique
            </li>

        </ul>
        <p style="font-size: 11px;">
            A l’adresse <span class=\"{address_project}\"></span>
        </p>
        <p style="font-size:11px;">
            <b>Après avoir visité la maison,</b> <br>
            <span style="margin-left:15px;">La cohérence des travaux entre les travaux réalisés et le scénario de travaux prévu a bien été vérifié ce jour en</span>
            <span style="margin-left:15px;">présence du bénéficiaire et de l’accompagnateur rénov.</span> <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;margin-left:25px;" class="{consistency_of_work_scenarios_checked1}"> Oui <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;margin-left:25px;" class="{consistency_of_work_scenarios_checked2}"> Non
        </p>
        <p style="font-size: 11px;margin-left:15px;">
            Et par suite <b>je déclare que : </b>
        </p>
        <ul style="list-style: none">
            <li style="font-size: 11px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="reception_is_pronounced1"> La réception est prononcée sans réserve.
            </li>
            <li style="font-size: 11px;margin-top:20px;">
                <input type="checkbox" style="vertical-align: top;height:8px;width:8px;margin-right:15px;" class="reception_is_pronounced2"> La réception est prononcée avec réserves mentionnées dans la liste suivante.
            </li>
        </ul>
        <section class="dotted-line"></section>
        <p style="font-size:11px;">
            <span class=\"{description_reception_is_pronounced}\"></span>
        </p>
    </div>



    <div style="text-align: right;margin-top:50px;">
        <span style="font-size:10px;font-weight:bold;display: inline-block;text-align: center;">
            Fait en double exemplaire <br>
            A <span class="{client_city}"></span>, le <span class="{date}"></span> <br>
            <span style="font-size: 13px;font-weight:bold">Mon Accompagnateur Rénov, </span>
        </span>
    </div> --}}
</body>
</html>
