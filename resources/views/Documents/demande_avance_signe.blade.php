<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demande Avance sur devis</title>

    <style>
        @font-face {
            font-family: "Open Sans";
            src: url("{{ storage_path('fonts/OpenSans-Light.ttf') }}") format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url("{{ storage_path('fonts/OpenSans-SemiBold.ttf') }}") format("truetype");
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url("{{ storage_path('fonts/OpenSans-Bold.ttf') }}") format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: "Open Sans";
            src: url("{{ storage_path('fonts/OpenSans-LightItalic.ttf') }}") format("truetype");
            font-weight: 400;
            font-style: italic;
        }

        body {
            font-family: "Open Sans", sans-serif !important;
            margin: 0;
            padding: 20px;
            background-color: white;
        }

        @media print {
            .page-break {
                page-break-before: always;
            }

            p {
                margin-top: 0;
            }
        }

        h1 {
            font-size: 22px;
            text-align: left;
            margin-bottom: 0px;
            text-transform: uppercase;
            position: relative;
            top: 20px;
            padding-left: 50px;
            font-weight: 600;
            line-height: 1;
            padding-bottom: 0;
        }

        .section-title {
            margin-bottom: 15px;
            font-size: 11px;
        }

        .dots {
            border-bottom: 1px dotted black;
            width: 100%;
            height: 1px;
            margin-bottom: 20px;
            font-size: 16px;
            flex-grow: 1;
            text-align: right;
            margin-left: 10px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info strong {
            display: inline-block;
            width: 150px;
        }

        .squares {
            width: 11px;
            /* Taille du carré */
            height: 11px;
            /* Hauteur du carré */
            border-bottom: 1px solid rgb(50, 49, 49);
            /* Ligne uniquement en bas */
            border-right: 1px solid rgb(50, 49, 49);
            /* Ligne uniquement à droite */
            border-left: 1px solid rgb(50, 49, 49);
            display: inline-block;
            position: relative;
            /* Permet de déplacer avec top */
            top: 5px;
            line-height: 9px;

        }

        .box {
            border: 1px solid #f9a51b;
            padding: 0px !important;
            margin: 20px 0;
            background-color: #f9a51b;
            color: white;
            overflow: hidden;
            font-size: 16px;
            font-weight: 600;
        }

        /* Style pour la section DELEGATION */
        .delegation {
            border: 0.5px solid #ebae3f;
            padding: 10px;
            width: 300px;
            float: right;
            /* Alignement à droite */
            margin-top: 20px;
            margin-left: 20px;
            /* Marge à gauche pour espacer du reste du contenu */
            position: relative;
            top: -20px;
            color: rgb(50, 49, 49);
        }

        .logo {
            position: absolute;
            /* Position absolue pour le logo */
            top: -10px;
            /* Ajustez la position verticale si nécessaire */
            left: 20px;
            /* Marge à gauche pour le logo */
            width: 115px;
            /* Ajustez la taille du logo */
        }

        .logocerfa {
            position: absolute;
            top: 90px;
            left: 40px;
            width: 100px;
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

        .squares-row1 {
            display: inline-block;
            gap: 10px;
        }

        .dot li {
            list-style: none;
            position: relative;
            font-size: 11px;
            margin-bottom: 5px !important;
        }

        .dot li::before {
            content: "• ";
            color: #f9a51b;
            font-size: 37px;
            position: absolute;
        }

        .dot1 li::before {
            left: -15px;
            top: -17px;
        }

        .dot2 li::before {
            left: -15px;
            top: -10px;
        }

        .dot3 li::before {
            left: -15px;
            top: -5px;
        }

        .dot {
            margin-top: 5px;
            margin-bottom: 4px;
            padding-left: 20px;
            line-height: 0.6 !important;
        }

        .block {
            width: 45px;
            height: 30px;
            background-color: #f9a51b;
            border-radius: 5px;
        }

        .page-break {
            page-break-after: always;
            /* Pour les impressions et PDF */
            display: block;
            /* S'assure que le saut de page fonctionne */
            height: 0;
            /* Pas d'espace visuel ajouté */
        }

        .line_1 {
            border-top: 1px solid #080808;
            width: 95%;
            margin: 0 auto;
        }

        .reserved {
            width: 350px;
            float: right;
            margin-top: 110px;
            margin-left: 20px;
            text-align: right;
            clear: both;
            color: #ebae3f;
            font-size: 10px;
        }

        .roboto-italic {
            font-size: 9.1px;
            padding-left: 50px;
            text-align: justify;
            font-style: italic;
        }

        .roboto-italic1 {
            font-size: 9.1px;
            padding-left: 10px;
            text-align: justify;
            font-style: italic;
        }

        .custom-bullet::before {
            content: "•";
            font-size: 17px;
            margin-right: 3px;
            margin-top: 2px;
            font-weight: bold;
        }

        .custom-bullet {
            /* margin-bottom: 0px;  */
            text-align: justify;
            font-size: 11px;
            margin: 0 !important;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div style="color: #f9a51b">
        <h4 style="margin-left: 150px; font-size: 12px">
            | Propriétaire occupant
        </h4>
    </div>

    <img src="{{ resource_path('images/agence-nationale.png') }}" alt="Logo de l'enseigne" class="logo" />
    <!-- Ajoutez ici le chemin vers votre image logo -->
    <img src="{{ resource_path('images/cerfa.jpg') }}" alt="Logo de cerfa" class="logocerfa" />
    <!-- Ajoutez ici le chemin vers votre image logo -->

    <div class="delegation">
        <div class="section-title">
            DELEGATION ....................................................
        </div>

        <div class="info-row">
            N° de dossier &nbsp;
            <div class="squares-row">
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
            </div>
        </div>
        <div class="info-row">
            Date du dépôt &nbsp;
            <div class="squares-row1">
                <div class="squares"></div>
                <div class="squares"></div>
                &nbsp;
                <div class="squares"></div>
                <div class="squares"></div>
                &nbsp;
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
                <div class="squares"></div>
            </div>
        </div>
    </div>

    <p class="reserved">Réservé à l’Anah</p>
    <div style="clear: both"></div>

    <h1 style="color: #eca219">
        DEMANDE DE VERSEMENT D’UNE AVANCE<br />
        POUR LE COMMENCEMENT DES TRAVAUX<sup style="font-size: 8px; color: black; vertical-align: 9px">(1)</sup>
    </h1>

    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

    <p
        style="font-size: 13px;line-height: 0.9;color: #1a1919;text-align: justify;padding-left: 50px;word-spacing: -1px;">
        Vous sollicitez une demande d’aide de l’Agence nationale de l’habitat pour
        des travaux dans votre habitation principale.<strong>Si votre demande fait l’objet d’une décision favorable
            d’attribution de
            subvention,</strong>vous pouvez sous certaines conditions bénéficier, dans un délai très
        rapide, du
        <strong>
            versement d’une avance pour le commencement des travaux à hauteur de 70
            % de la subvention accordée.</strong><br /><br />
        Le versement d’une avance est réservé aux propriétaires aux ressources
        très modestes bénéficiant d’une aide de l’Anah pour les travaux
        d’autonomie de la personne ou d’une aide du FART (programme Habiter
        Mieux). Ce dispositif n’est pas cumulable avec une demande d’Eco-prêt
        Habiter Mieux.<br /><br />
        Pour cela il suffit de compléter et surtout de signer le présent document
        qui précise les conditions dans lesquelles cette avance peut vous être
        versée et les engagements et obligations auxquels vous serez tenus en
        contrepartie.<br /><br />
        <strong>Aucune avance ne pourra être versée si ce document n’est pas daté et
            signé de vous ou de votre mandataire
            <sup style="font-size: 9px">(2)</sup>.</strong><br /><br />
        Si votre demande d’aide fait l’objet d’une décision défavorable, le
        présent engagement deviendra automatiquement sans effet, et cela, sans
        aucune démarche de votre part.<br /><br />
        Nous vous suggérons d’effectuer une copie de cette demande afin de
        conserver une trace des engagements que vous souscrivez.<br /><br />
        Votre délégation de l’Anah
    </p>
    <div style="position: absolute; top: 91%; width: 90%">
        <section class="line_1" style="margin-left: 40px"></section>
        <p class="roboto-italic">
            <sup style="font-size: 5px">(1)</sup>Cette demande auprès de la
            délégation de l’Anah ou du délégataire peut être formulée, soit en
            accompagnement de la demande de subvention, soit après la notification
            de la décision attributive de subvention et, dans tous les cas, avant
            tout commencement des travaux et avant tout paiement de l’Anah. La
            procédure d’avance étant mise en place pour une durée limitée, se
            rapprocher de l’Anah pour savoir si votre dossier peut encore en
            bénéficier.<br />
            <sup style="font-size: 5px">(2)</sup>En cas de désignation d’un
            mandataire, une procuration sous seing privé pour le versement des fonds
            sera exigée à l’appui de la demande (voir rubrique « pièces à joindre »
            ci-après).
        </p>
    </div>
     <div style="position: absolute; left : 1%; top: 94%; width: 5%;">
        <p
            style=" writing-mode: vertical-rl;
    transform: rotate(-90deg);
     font-size:8px;margin-left:-26px; line-height: 7px; text-align: justify; font-family: 'Open Sans', sans-serif;font-style : italic;color: rgb(0, 0, 0)"
            >

            03/16
        </p>
    </div>
    <div style="position: absolute; top: 100%; left: 99%">
        <table style="border: #f9a51b solid 1px">
            <tr>
                <td>
                    <p style="color: #f9a51b; margin-top: -5px; margin-bottom: -5px">
                        1
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <div class="block" style="position: absolute; top: 60%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 64%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 68%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 72%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 76%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 80%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 84%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 88%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 92%; right: 101%"></div>
    <div class="block" style="position: absolute; top: 96%; right: 101%"></div>
    <div class="page-break"></div>
    <!-- Saut de page ici -->

    <p style="font-size: 11px; margin-top: -10px; text-align: justify">
        Je soussigné(e) :<br />
        Nom <sup style="font-size: 9px">(3)</sup>: {{ $project->client?->first_name }} &nbsp;&nbsp; Prénom :
        {{ $project->client?->last_name }}<br />
        Adresse : {{ $project->client->address . ' ' . $project->client->zip_code . ' ' . $project->client->city }}
    </p>
    <div style="font-size: 11px">
        Code postal :
        <div class="squares-row1">
            @php
                $dateCharacters = str_split($project->client->zip_code);
            @endphp
            @foreach ($dateCharacters as $char)
                <div class="squares">{{ $char }}</div>
            @endforeach
        </div>
        Commune : {{ $project->client->commune }}
    </div>
    <p style="font-size: 11px">
        En cas de mandataire, indiquez ici ces coordonnées :<br />
        Nom et adresse du mandataire<sup style="font-size: 9px">(2)</sup>:
        {{ $project->mandataire_company?->representative_last_name }}
        {{ $project->mandataire_company?->representative_first_name }}
        {{ $project->mandataire_company?->address .
    ' ' .
    $project->mandataire_company?->zip_code .
    ' ' .
    $project->mandataire_company?->city }}
    </p>

    <div style="font-size: 11px">
        Date de la demande de subvention de l’Anah :
        <div class="squares-row1">
            @php
                $dateCharacters = str_split($project->anah_date);
            @endphp

            @foreach ($dateCharacters as $char)
                <div class="squares">{{ $char }}</div>
            @endforeach
        </div>
        <br />
        S’il vous a déjà été fourni, indiquez ici le n° de dossier Anah :{{ $project->anah_folder }}
    </div>
    <span>&nbsp;&nbsp;</span>

    <ul class="dot dot3">
        <li>
            Demande le versement d’une avance égale au maximum à 70 % de la
            subvention<sup style="font-size: 9px">(4)</sup>dans les conditions
            suivantes :
        </li>
        <p class="custom-bullet">
            les travaux ne sont pas déjà commencés à la date où je sollicite cette
            avance,<br />
        </p>
        <p class="custom-bullet">
            ma demande de subvention doit faire ou avoir fait l’objet d’une décision
            favorable de la part de l’Anah,<br />
        </p>
        <p class="custom-bullet">
            aucun versement d’acompte de la part de l’Anah n’est déjà intervenu<br />
        </p>
        <p class="custom-bullet">
            <span style="line-height: 8px; margin: 0 !important">
                je dois être en mesure, à l’appui de cette demande, de fournir un
                devis d’une entreprise participant à la réalisation des travaux
                subventionnés, daté et signé par l’entreprise et par moi-même ou mon
                mandataire et faisant mention d’une demande d’acompte à l’acceptation
                du devis ou pour le démarrage des travaux. <br />
            </span>
        </p>
    </ul>
    &nbsp;
    <ul class="dot dot2">
        <li>Si je bénéficie du versement de l’avance, je m’engage à :</li>
        <p class="custom-bullet">
            commencer ou avoir commencé les travaux, objet de la subvention, dans un
            délai maximal de 6 mois qui suivent la date de réception du courrier
            m’informant du montant de la subvention qui m’aura été réservée par
            l’Anah (lettre de notification de la décision attributive de subvention)
            <sup style="font-size: 9px">(5)</sup>,<br />
        </p>
        <p class="custom-bullet">
            de façon générale respecter toutes les autres conditions liées au
            bénéfice de la subvention de l’Anah et à la réalisation des travaux par
            entreprise,
        </p>
        <p class="custom-bullet">
            répondre aux demandes de renseignements et de contrôle de l’Agence liées
            au bénéfice de cette avance.<br />
        </p>
    </ul>
    &nbsp;
    <ul class="dot dot2">
        <li>Je reconnais avoir été informé(e) que :</li>

        <p class="custom-bullet">
            le dispositif d’avance de l’Anah n’est pas cumulable avec celui de
            l’avance remboursable sans intérêt destinée au financement de travaux
            d’amélioration de la performance énergétique des logements anciens
            prévue à l’article R. 319-16 du Code de la construction et de
            l’habitation (Eco-prêt Habiter Mieux) ;<br />
        </p>
        <p class="custom-bullet">
            si je ne respecte pas les présents engagements, l’avance sur subvention
            de l’Anah devra être remboursée, et cela, indépendamment ou non du
            bénéfice de la subvention.<br />
        </p>
    </ul>

    &nbsp;
    <div style="width: 100%">
        <table style="width: 100%; border-collapse: collapse; table-layout: fixed">
            <tr>
                <!-- Colonne gauche : "Fait à" -->
                <td style="width: 50%; text-align: left; font-size: 12px">
                    Fait à <span>...................................</span>
                    <span style="font-size: 13px">, le</span>
                    <div class="squares-row1">
                        <div class="squares"></div>
                        <div class="squares"></div>
                        &nbsp;
                        <div class="squares"></div>
                        <div class="squares"></div>
                        &nbsp;
                        <div class="squares"></div>
                        <div class="squares"></div>
                        <div class="squares"></div>
                        <div class="squares"></div>
                    </div>
                </td>
                <!-- Colonne centrale : Les carrés -->

                <!-- Colonne droite : Signature -->
                <td style="width: 50%; text-align: left; font-size: 13px">
                    Signature<br />
                    @if (isset($project->mandataire_company?->signature))
                        <img src="{{ storage_path('app/' . $project->mandataire_company?->signature) }}"
                            alt="Agence" style="width: 100px;height:auto;">
                    @endif

                </td>
            </tr>
        </table>
    </div>
    <p
        style="
        font-size: 11px;
        font-style: italic;
        margin: 0;
        padding: 0;
        color: rgb(50, 49, 49);
      ">
        (Date et signature obligatoires)
        <sup style="font-size: 9px; position: relative; top: -3px">(3)</sup>
    </p>

    <div class="box">PIÈCES PARTICULIÈRES À JOINDRE À CETTE DEMANDE :</div>
    <ul class="dot dot1" style="line-height: 0.9 !important">
        <li style="font-size: 11px; text-align: justify">
            Si ce document n’a pas déjà été fourni dans la demande de subvention, au
            moins un devis d’entreprise participant à la réalisation des travaux
            subventionnés,
            <strong>daté et signé par l’entreprise et par moi même ou mon
                mandataire</strong>
            et faisant mention d’une<strong>
                demande d’acompte à l’acceptation du devis</strong>
            ou pour le commencement des travaux.
        </li>
    </ul>

    <ul class="dot dot1" style="line-height: 0.9 !important">
        <li style="font-size: 11px; text-align: justify">
            Un Relevé d’Identité Bancaire (RIB), en original, du compte bancaire sur
            lequel devra être effectué le virement correspondant.
        </li>
    </ul>

    <ul class="dot dot1" style="line-height: 0.9 !important">
        <li style="font-size: 11px; text-align: justify">
            Le cas échéant, si un mandataire est nécessaire ou désigné par le
            bénéficiaire pour percevoir les fonds, une procuration sous seing privé
            répondant aux règles exigées par l’Agence (se reporter au formulaire
            adapté disponible auprès de votre délégation de l’Anah ou sur le site
            internet www.anah.fr).
        </li>
    </ul>

    <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>

    <div style="position: absolute; top: 88%; width: 90%">
        <section class="line_1" style="margin-left: 10px"></section>
        <p class="roboto-italic1">
            <sup style="font-size: 5px">(3)</sup>La demande d’avance doit être
            signée par la même personne que celle qui sera bénéficiaire de la
            subvention ou son mandataire, désigné conformément à la réglementation
            de l’Anah.<br />
            <sup style="font-size: 5px">(4)</sup>Le montant de la subvention
            comprend l’aide de l’Anah et, le cas échéant, l’aide du FART (programme
            Habiter Mieux).<br />
            <sup style="font-size: 5px">(5)</sup>Dans certaines conditions très
            limitées, un délai supplémentaire de 6 mois pourra être accordé par
            l’Anah mais devra être justifié : dans tous les cas, la prorogation de
            ce délai devra être sollicitée avant l’expiration du délai de 6 mois. Se
            reporter pour cela à l’article 14 du règlement général de l’Anah.<br />
            Références : Code de la construction et de l’habitation : art R.321-18
            et règlement général de l’Anah notamment les articles : 14, 18, 18 bis
            et 21 bis, décret n° 2015-1911 du 30 décembre 2015 relatif au règlement
            des aides du FART.
        </p>
    </div>
    <div style="position: absolute; top: 100%; left: 99%">
        <table style="border: #f9a51b solid 1px">
            <tr>
                <td>
                    <p style="color: #f9a51b; margin-top: -5px; margin-bottom: -5px">
                        2
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
