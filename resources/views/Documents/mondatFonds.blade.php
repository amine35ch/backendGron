<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandat des fonds</title>

    <style>
        @font-face {
            font-family: 'Open Sans';
            src: url('{{ storage_path('fonts/OpenSans-Light.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ storage_path('fonts/OpenSans-SemiBold.ttf') }}') format('truetype');
            font-weight: 600;
            font-style: normal;

        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ storage_path('fonts/OpenSans-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;

        }

        @font-face {
            font-family: 'Open Sans';
            src: url('{{ storage_path('fonts/OpenSans-LightItalic.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        body {
            font-family: 'Open Sans', sans-serif !important;
            margin: 0;
            padding: 20px;
            background-color: white;
        }

        h1 {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .section-title {

            margin-bottom: 15px;
            font-size: 11px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info strong {
            display: inline-block;
            width: 150px;
        }

        .squares {
            text-align: center;
            width: 11px;
            height: 11px;
            border-bottom: 1px solid rgb(50, 49, 49);
            border-right: 1px solid rgb(50, 49, 49);
            border-left: 1px solid rgb(50, 49, 49);
            display: inline-block;
            position: relative;
            top: 5px;
            line-height: 9px;
        }

        .squares-row1 {
            display: inline-block;
            gap: 10px;

        }
 .gap0 {
            gap: 0px !important;

        }
        .border-box {
            border: 0.5px solid rgb(50, 49, 49);
            padding: 3px;
            margin: 20px 0;
            background-color: #ffffff;
            font-size: 11px;
            text-align: justify;
            font-family: 'Open Sans', sans-serif;
            margin-left: 50px;
            width: 650px;
        }

        .box {
            border: 1px solid #008184;
            padding: 0px !important;
            margin: 7px 0;
            background-color: #008184;
            color: white;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            line-height: 1;
        }


        /* Styles pour l'impression */
        @media print {
            @page {}

        }

        .delegation {
            border: 0.5px solid #008184;
            padding: 10px;
            width: 350px;
            float: right;
            margin-top: 40px;
            margin-left: 20px;
            position: relative;
            top: -10px;
            color: rgb(50, 49, 49)
        }

        .logo {
            position: absolute;
            top: -40px;
            left: 10px;
            width: 110px;
        }

        .logocerfa {
            position: absolute;
            top: 65px;
            left: 80px;
            width: 55px;
        }

        .circle {
            display: inline-block;
            width: 9px;
            height: 9px;

            background-color: #008184;
            border-radius: 50%;
            margin-right: 5px;
            vertical-align: middle;
            position: relative;
            top: 2px;

        }

        .block {
            width: 45px;
            height: 30px;
            background-color: #008184;
            ;
            border-radius: 5px;
        }

        .info-row {
            white-space: nowrap;
            font-size: 11px;
            margin-bottom: 8px;
        }

        .squares-row {
            display: inline-block;
            gap: 10px;
            font-size: 0;
        }

        .right {
            color: #008184;
            text-align: right;
            margin-top: 10px;
        }

        .dark-teal {
            color: #008184;
            font-family: 'Open Sans', sans-serif;
            font-size: 24px;
            text-align: left;
            font-weight: 600;
            line-height: 1;
            padding-left: 50px;


        }

        .dark-teal1 {
            color: #008184;
            font-family: 'Roboto', sans-serif;
            font-size: 13px;
            text-align: left;
            padding-left: 50px;


        }


        .dot li {
            list-style: none;
            position: relative;
            font-size: 10px;
            top: 20px;
        }

        .dot li::before {
            content: "• ";
            color: #008184;
            font-size: 55px;
            position: relative;
            /* left: -20px; */
            top: 15px;
        }
        .subdot li::before {
            content: "• ";
            color: black !important;
            font-size: 30px;
            margin-top: 0;
            padding-top: 0;

        }


        .image-container {
            text-align: left;
        }


        .line_1 {
            border-top: 0.5px solid #008184;
            width: 100%;
            margin: 0 auto;
        }

        .reserved {
            width: 390px;
            float: right;
            margin-top: 118px;
            margin-left: 20px;
            text-align: right;
            clear: both;
            color: #008184;
            font-size: 10px;

        }

        .custom-bullet {
            position: relative;
        }

        .custom-bullet::before {
            content: "• ";
            color: black;
            font-size: 16px;
            position: absolute;
            left: -20px;
        }
        .vertical-text {
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    text-align: center;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}
    </style>
</head>

<body>
    @php
        use Carbon\Carbon;

        $installateur = $installer ?? $project->installer?->company;
        $invoice =
            $invoice ??
            $project->invoices->where('type', \App\Enums\DInvoiceEnum\DInvoiceHeaderType::INSTALLER->value)->first();
    @endphp
    <img src="{{ resource_path('images/Logo-ANAH-Mandat-des-fonds-JPG.jpg') }}" alt="Logo de l'enseigne" class="logo">

    <div class="delegation">
        <div class="section-title">DELEGATION .....................................</div>

        <div class="info-row">
            N° de dossier &nbsp;
            <div class="squares-row">
    @for ($i = 1; $i <= 9; $i++)
        <div class="squares"   @if ($i != 9)
              style="border-right:0"
          @endif></div>
    @endfor
</div>

        </div>

        <div class="info-row">
            Date du dépôt &nbsp;
            <div class="squares-row">
                 @for ($i = 1; $i <= 9; $i++)
                            <div class="squares"
                          style="
                    @if ($i === 2 || $i === 4) margin-right:10px; @endif
                    @if ($i != 9 && $i != 2 && $i != 4) border-right:0; @endif"
                              ></div>
                @endfor
                <!-- <div class="squares"></div>
                <div class="squares" style="margin-right:10px"></div>
                <div class="squares"></div>
                <div class="squares"  style="margin-right:10px"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div> -->
            </div>
        </div>
    </div>



    <p class="reserved">Réservé à l’Anah</p>
    <div style="clear: both;"></div>

    <div class="dark-teal ">PROCURATION SOUS SEING PRIVÉ <br>POUR LA PERCEPTION DES FONDS<br></div>
    <div class="dark-teal1"> SUBVENTION D’UN MONTANT INFÉRIEUR OU ÉGAL À 5 300 € <sup
            style="font-size: 8px;">(1)</sup><br>
        OU SUBVENTION POUR LES PROPRIÉTAIRES OCCUPANTS</div>
    <div class="border-box" style="line-height:10px;">
        En l’absence d’un mandat valide et suffisant (cas de certains administrateurs de biens), une procuration doit
        être établie dans tous les
        cas où le demandeur désigne un mandataire, pour percevoir la subvention, et obligatoirement quand la propriété
        est partagée entre
        plusieurs personnes ne possédant pas un compte bancaire commun.
    </div>

  <p style="font-size: 11px; margin-top: -15px; text-align: justify; margin-left: 50px;">
        <span class="circle"></span>Je soussigné(e) :<br>
    </p>
    <p style="font-size: 11px; margin-top: -15px; text-align: justify; margin-left: 63px;">
        Nom : <span class="{company_name}"> {{ $project->client?->first_name }}</span><br>
        Prénom :
        {{ $project->client?->last_name }}<br>
        Adresse : <span
            class="{company_address}">{{ $project->client->address . ' ' . $project->client->zip_code . ' ' . $project->client->city }}</span><br>
    </p>
    <div style="font-size: 11px; margin-left: 63px;margin-top: -10px;">Code postal :
        <div class="squares-row gap0" style="gap:0px !important;">
            @php
                // Découpe la date en caractères individuels
                $dateCharacters = str_split($project->client->zip_code);
            @endphp

            @foreach ($dateCharacters as $key => $char)
                @if ($char === '/')
                    <!-- Ajoute un espace pour les séparateurs -->
                    &nbsp;
                @else
                    <span class="squares"

                       @if ($key != count($dateCharacters) - 1)
                          style="border-right:0"
                      @endif
                      >{{ $char }}</span>
                @endif
            @endforeach
        </div>
        &nbsp;&nbsp;&nbsp;
        Commune : {{ $project->client->commune }}
        <br>
    </div>
    <p style="font-size: 11px; margin-left: 63px;  text-align: justify;margin-top: -5px;">
        Le cas échéant, représentant légal de la personne
        morale:..........................................<br>
        dont le siège se trouve:.................................<br>
        propriétaire (ou locataire) de l’immeuble sis à (adresse complète de l’immeuble, désignation, le cas échéant, du
        bâtiment, de l’étage et
        de l’appartement) :{{ $project->address . ' ' . $project->zip_code . ' ' . $project->city }}<br>
        donne mandat à M. (nom et prénom, qualité et adresse du mandataire désigné) :
        {{ $project->mandataire_company?->representative_last_name }}
        {{ $project->mandataire_company?->representative_first_name }}
        {{ $project->mandataire_company?->address . ' ' . $project->mandataire_company?->zip_code . ' ' . $project->mandataire_company?->city }}<br>
        <strong>pour recevoir en mon nom et pour mon compte le montant de la subvention </strong>accordée par l’Agence
        et, en conséquence,
        à présenter en mon nom, les pièces justifiant l’exécution des travaux ainsi que tout document nécessaire au
        calcul et au versement de la
        subvention et à recevoir en mon nom toute correspondance émise par l’Agence relative au paiement<sup
            style="font-size: 8px;">(1)</sup>.

    </p>

    <div style="width: 100%;  margin-left: 63px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; vertical-align: top;font-size: 11px;">

                    Fait à <span>.................</span> <span style="margin-left:-2px;">, le</span>
                    <div class="squares-row">
                        @for ($i = 1; $i <= 9; $i++)
                                    <div class="squares"
                                  style="
                            @if ($i === 2 || $i === 4) margin-right:10px; @endif
                            @if ($i != 9 && $i != 2 && $i != 4) border-right:0; @endif"
                                      ></div>
                        @endfor
                    </div>

                    <p style="font-size: 11px;"> <strong>Signature du mandataire</strong><br>
                        précédée de la mention manuscrite<br>
                        “Bon pour acceptation de mandat”:<br>
                        @if (isset($project->mandataire_company?->signature))
                            <img src="{{ storage_path('app/' . $project->mandataire_company?->signature) }}"
                                alt="Agence" style="position:relative;top:-50px;left:190px; width: 100px;height:auto;">
                        @endif
                    </p>
                </td>

                <td style="width: 50%; vertical-align: top;font-size: 11px;">

                    Fait à <span>.................</span> <span style="margin-left:-2px;">, le</span>
                    <div class="squares-row">
                         @for ($i = 1; $i <= 9; $i++)
                                    <div class="squares"
                                  style="
                            @if ($i === 2 || $i === 4) margin-right:10px; @endif
                            @if ($i != 9 && $i != 2 && $i != 4) border-right:0; @endif"
                                      ></div>
                        @endfor
                    </div>

                    <p style="font-size: 11px;"><strong>Signature du ou des mandant(s)</strong><br>
                        précédée de la mention manuscrite<br>
                        “Bon pour pouvoir”:<br>
                        @if ($project->client->signature)
                            <img src="{{ storage_path('app/' . $project->client->signature) }}" alt="signature"
                                style="position:relative;top:-50px; width: 200px;left:180px;height:auto;">
                        @endif
                    </p>

                </td>
            </tr>
        </table>
    </div>

    <P style="position: absolute; top: 80%; width: 90%;font-size: 11px; padding-top: 5px;  text-align: justify;  margin-left: 50px; line-height:1;"> <strong>
            Toute fausse déclaration à l’occasion du dépôt de la demande de paiement, ou de toute autre démarche
            vis-à-vis de
            l’Anah entraînera le retrait de l’aide allouée, le remboursement des sommes indûment perçues éventuellement
            majorées par décision du Conseil d’administration, et l’interdiction de déposer en tant que propriétaire ou
            en tant que
            mandataire des dossiers de subvention auprès de l’Anah et ce, sans préjudice de poursuites
            judiciaires.</strong></P>
    <div style="position: absolute; top: 90%; width: 90%;">
        <section class="line_1" style="margin-left:20px;"></section>
        <p
            style="font-size:9.3px;margin-left:20px; line-height: 7px; text-align: justify; font-family: 'Open Sans', sans-serif;font-style : italic;color: rgb(50, 49, 49)">
            <sup style="font-size: 7px;">(1)</sup>Le RIB (en original) produit doit être établi au nom du
            mandataire.<br>
            <span   style=" font-family: 'Open Sans'">
                Vu la loi n°78-17 du 6 janvier 1978 modifiée relative à l’informatique, aux fichiers et aux libertés : les
                informations recueillies font l’objet d’un traitement informatique destiné à
                l’instruction de votre demande de subvention ainsi qu’à des exploitations statistiques. Les destinataires
                des données sont : les services de l’Agence, les organismes partenaires et,
                le cas échéant, la collectivité locale du lieu du bien concerné. Conformément à la loi « informatique et
                libertés » du 6 Janvier 1978, vous bénéficiez d’un droit d’accès et de
                rectification aux informations qui vous concernent. Si vous souhaitez exercer ce droit et obtenir
                communication des informations vous concernant, veuillez vous adresser à la
                délégation locale de votre département. Vous pouvez également pour des motifs légitimes, vous opposer au
                traitement des données vous concernant.
            </span>
        </p>
    </div>
     <div style="position: absolute; left : 1%; top: 94%; width: 5%;">
        <p
            style=" writing-mode: vertical-rl;
    transform: rotate(-90deg);
     font-size:8px;margin-left:-26px; line-height: 7px; text-align: justify; font-family: 'Open Sans', sans-serif;font-style : italic;color: rgb(50, 49, 49)"
            >

            06/09 - N° 8
        </p>
    </div>
    <div style="position: absolute; top:100%;left:98%;border: #288592 solid 1px;height:15px; width:15px;display:flex;justify-content: center; align-items:center ;padding-left:1px;padding-right:1px;padding-bottom:1px ;">
                    <p style="font-weight:500; color:#288592;margin:0px;font-size:12px;padding-left:5px;margin-bottom:2px; width:100%">1</p>
        <!-- <table >
            <tr>
                <td style="border: #288592 solid 1px; height:10px;width : 10px; text-align:center ">
                    <p style=" color:#288592;margin:0px;font-size:10px">1</p>
                </td>
            </tr>
        </table> -->
    </div>
    <div class="block" style="position: absolute; top:60%; right:101%"></div>
    <div class="block" style="position: absolute; top:64%; right:101%"></div>
    <div class="block" style="position: absolute; top:68%; right:101%"></div>
    <div class="block" style="position: absolute; top:72%; right:101%"></div>
    <div class="block" style="position: absolute; top:76%; right:101%"></div>
    <div class="block" style="position: absolute; top:80%; right:101%"></div>
    <div class="block" style="position: absolute; top:84%; right:101%"></div>
    <div class="block" style="position: absolute; top:88%; right:101%"></div>
    <div class="block" style="position: absolute; top:92%; right:101%"></div>
    <div class="block" style="position: absolute; top:96%; right:101%"></div>
    <div class="page-break"></div>

    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

    <ul class="dot" style="margin-left:-21px">
        <li class="" style="margin-left:-21px;line-height: 15px;">Le demandeur (propriétaire, locataire, copropriétaire déposant une demande individuelle) peut librement
            désigner un mandataire.</li>
        <li  style="margin-left:-21px;line-height: 15px;">Le présent formulaire prévoit une procuration pour un mandat unique.</li>
        <li  style="margin-bottom:20px; margin-left:-21px;line-height: 15px;">Le présent formulaire doit être utilisé :
            <ul class="subdot"  style=" padding-top: 0;; margin-top: -20px;">
                <li >  <span>pour toute subvention inférieure ou égale à 5 300 € versée à
                une personne autre que le demandeur ;</span></li>
                <li>  <span style="">pour toute subvention inférieure ou égale à 5 300 € versée à
                une personne autre que le demandeur ;<br></span></li>
                <li>  <span style="">pour toute subvention, quel que soit le montant, versée à un
                administrateur de biens présentant une carte professionnelle « gestion immobilière » en cours de
                validité.</span></li>
            </ul>
        </li>
        <li  style="margin-left:-21px;line-height: 15px;">Les subventions supérieures à 5 300 € autres que celles des propriétaires occupants devront faire l’objet de
            procurations notariées lorsqu’elles sont versées à une personne autre que le demandeur.</li>
    </ul>



    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <div class="box">
        CAS PARTICULIERS
    </div>
    <li style="font-size: 11px;  margin-left: 20px;"> Si le demandeur est <strong>un mineur </strong> ou un <strong>
            majeur placé sous tutelle,</strong> la procuration éventuelle sera signée par le tuteur.</li>
    <li style="font-size: 11px;  margin-left: 20px;"> Si le demandeur est<strong> un majeur placé sous
            curatelle,</strong> la procuration éventuelle sera signée par l’interessé et le curateur</li>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <div class="box">
        OBSERVATION
    </div>
    <li style="font-size: 11px ;  margin-left: 20px;"> La désignation d’un mandataire pour la perception des fonds est
        obligatoire quand la propriété est partagée entre plusieurs personnes ne
        possédant pas un compte bancaire commun.</li>

    <!-- <div style="position: absolute; top:100%;left:98%;">
        <table style="border: #288592 solid 1px;">
            <tr>
                <td>
                    <p style="color:#288592;margin-top:-5px;margin-bottom:-5px;">2</p>
                </td>
            </tr>
        </table>
    </div> -->
    <div class="block" style="position: absolute; top:60%; left:101%"></div>
    <div class="block" style="position: absolute; top:64%; left:101%"></div>
    <div class="block" style="position: absolute; top:68%; left:101%"></div>
    <div class="block" style="position: absolute; top:72%; left:101%"></div>
    <div class="block" style="position: absolute; top:76%; left:101%"></div>
    <div class="block" style="position: absolute; top:80%; left:101%"></div>
    <div class="block" style="position: absolute; top:84%; left:101%"></div>
    <div class="block" style="position: absolute; top:88%; left:101%"></div>
    <div class="block" style="position: absolute; top:92%; left:101%"></div>
    <div class="block" style="position: absolute; top:96%; left:101%"></div>
      <div style="position: absolute; top:100%;left:98%;border: #288592 solid 1px;height:15px; width:15px;display:flex;justify-content: center; align-items:center ;padding-left:1px;padding-right:1px;padding-bottom:1px ;">
                    <p style="font-weight:500; color:#288592;margin:0px;font-size:12px;padding-left:5px;margin-bottom:2px; width:100%">2</p>
</body>

</html>
