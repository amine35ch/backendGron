<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">



    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">



    <title>Devis Entreprise Retenue</title>
</head>
<style>
    /* Style global */
    /* Style global */
    body {

        font-size: 10px;
        font-family: 'Poppins', sans-serif;

    }

    /* Style pour enlever les bordures des tableaux */
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    /* Enlever les bordures des cellules */
    table th,
    table td {
        padding: 5px;
        border: none;
        /* Supprime les bordures */
        text-align: left;
    }

    /* En-tête du tableau */
    table th {
        background-color: #85a03d;
        color: white;
        text-align: center;
    }

    /* Lignes alternées */
    table tr:nth-child(even) {
        background-color: #e7edf2;
    }

    /* Colonnes pour les totaux */
    .total-cell {
        background-color: #d1dcb4;
        text-align: right;
        font-weight: bold;
    }

    /* Informations du client */
    .client-info {
        font-size: 10px;
        color: black;
    }

    .footer {
        width: 100% !important;

        color: #000000;
        position: absolute;
        /* Rendre le footer fixe */
        float: left;
        bottom: 0;
    }

    .footer-text {
        padding: 0 10px;
        /* Ajustez le rembourrage selon vos besoins */
        margin: 0 auto;
        /* Centrer le texte */
        width: 100%;
        text-align: justify;
        line-height: 17px
    }

    .footer-text-center {
        padding: 0 10px;
        /* Ajustez le rembourrage selon vos besoins */

        text-align: center
    }


    .footer p {
        margin: 5px 0;

    }

    .remerciement {
        width: 100% !important;

        color: #000000;
        position: absolute;
        /* Rendre le footer fixe */
        float: left;
        bottom: 0;
    }

    .footer-text {
        padding: 0 10px;
        /* Ajustez le rembourrage selon vos besoins */
        margin: 0 auto;
        /* Centrer le texte */
        width: 100%;
        text-align: justify;
        line-height: 17px
    }

    .footer-text-center {
        padding: 0 10px;
        /* Ajustez le rembourrage selon vos besoins */

        text-align: center
    }


    .footer p {
        margin: 5px 0;

    }

    .remerciement {
        width: 100%;
        text-align: center;
        font-weight: 700;
        color: #000000 font-weight: 700;
        color: #000000
    }

    .footer-info {
        background-color: #657532;
        /* Couleur de fond que vous souhaitez pour ce paragraphe */
        width: 100%
    }

    .footer-info-text {
        padding: 5px;
        /* Ajustez le rembourrage selon vos besoins */
        color: #ffffff;

        .footer-info {
            background-color: #657532;
            /* Couleur de fond que vous souhaitez pour ce paragraphe */
            width: 100%
        }

        .footer-info-text {
            padding: 5px;
            /* Ajustez le rembourrage selon vos besoins */
            color: #ffffff;
            text-align: center;
        }


        .header-devis {
            width: auto;
            display: flex !important;
            justify-content: space-between;

        }

        .logo {
            width: 45%
        }

        .details-devis {
            width: 45% .details-devis {
                width: 45%
            }
</style>

<body>

    @php
        use Carbon\Carbon;

        $installateur = $installer ?? $project->installer?->company;
        $invoice = $invoice ?? $project->invoices
            ->where('type', \App\Enums\DInvoiceEnum\DInvoiceHeaderType::INSTALLER->value)
            ->first();

        $formattedInvoiceDate = Carbon::parse($invoice->invoice_date)->format('d/m/Y');
        $formattedDate = \Carbon\Carbon::parse($project?->visits->where('type', 0)->first()?->visit_date)->format(
            'd/m/Y',
        );
        $passoir = in_array($project->EnergyperformanceBeforeWork?->entitled, ['F', 'G']) ? 'oui' : 'non';
        $rge_array = array_unique($installateur->rges->pluck('rge')->toArray());
        // Récupérer la description
        $content = $line->description_v2[0]['content'] ?? '';

        // Définir la longueur maximale avant de diviser le texte
        $maxLength = 1000;

        // Diviser le contenu en plusieurs morceaux si la longueur dépasse la limite
        $contentParts = [];
        if (strlen($content) > $maxLength) {
            $contentParts = str_split($content, $maxLength);
        } else {
            $contentParts[] = $content; // Si le texte est court, on le met tel quel
        }

    @endphp

    <!-- Informations du devis -->
    <div style="display: flex; "> <!-- Logo -->
        <div style="width: 50%;">
            <img src="{{ $installateur?->logo ? storage_path('app/' . $installateur?->logo) : resource_path('images/Logo-GRON-Green-BG.png') }}"
                alt="Logo" style="width: 80px; height: auto; margin-right: 10px;">
            <div style="display: flex; margin-top: 15px;">
                <!-- Colonne de gauche (Installateur) -->
                <div style="font-size: medium;">
                    <b style="color: #65752a;">{{ $installateur?->trade_name ?? '' }}</b><br><br>
                    {{ $installateur?->address ?? '' }}<br>
                    {{ $installateur?->zip_code . ', ' . $installateur?->city ?? '' }}<br>
                    <p style="margin: 0;">{{ $installateur?->email ?? '' }}</p>

                    <!-- Trait après l'email -->
                    <div style="border-top: 1px solid #bec1c7; width: 70%; margin:  10px 0;"></div>

                    <!-- Informations supplémentaires -->
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li style="margin-bottom: 5px;"><b>N°SIRET:</b> {{ $installateur?->siret ?? '' }}</li>
                        <li style="margin-bottom: 5px;"><b>N°TVA:</b> {{ $installateur?->identifiant_tva ?? '' }}</li>
                        <li style="margin-bottom: 5px;"><b>N°RGE:</b> {{ implode(', ', $rge_array) }}</li>
                        <li style="margin-bottom: 5px;">
                            <b>N°DECENNALE:</b>
                            @if ($installateur?->num_decennale)
                                {{ $installateur->num_decennale }}
                            @endif
                        </li>


                    </ul>



                </div>

                <!-- Colonne de droite (Client) -->


            </div>
        </div>

        <!-- Titre "DEVIS" et section à droite -->
        <div style="text-align: right; float: right; width: 45%;top:0; position:absolute; right:0 ">
            <h1
                style="font-size: 71px; font-weight: 900; color: #657532; margin: 0; margin-top: -50px; margin-bottom: 20px; font-family: 'Poppins', sans-serif;">
                DEVIS</h1>

            <!-- Informations du devis -->

            <div style="padding: 0 5px; text-align: left; margin-left: auto; transform: translateY(-1cm);">
                <!-- Utilisation de transform pour décaler vers le haut -->
                <div style="background-color: white; padding: 10px; width: 100%; text-align: left; margin-left: 90px;">
                    <div style="margin-bottom: 10px;">
                        <strong style="font-size: 14px;">N° DEVIS :</strong> &nbsp; &nbsp;<span
                            style="color: #7c8389; font-size: 14px;">#{{ $invoice->reference ?? '' }}</span>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <strong style="font-size: 14px;">Date :</strong>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<span
                            style="color: #282826; font-size: 14px;">{{ $formattedInvoiceDate }}</span>
                    </div>
                    <div>
                        <strong style="font-size: 14px;">Date visite :</strong> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<span
                            style="color: #282826; font-size: 14px;">{{ $formattedDate }}</span>
                    </div>
                </div>
            </div>

            <div
                style="width: 62%; padding: 10px; background-color: #d7e2b7; overflow: hidden; float: right; text-align:left; margin-top: -1cm;">
                <strong style="font-size: 14px; font-weight: 700; font-family: 'Poppins', sans-serif;">NOM ET
                    PRÉNOM:</strong>
                <p style="color: #282826;font-size: 14px; padding:0; margin:0">
                    {{ $project->client?->last_name . ' ' . $project->client?->first_name }}</p><br>
                <strong style="font-size: 14px;">ADRESSE:</strong>
                <p style="color: #282826;font-size: 14px; padding:0; margin:0">
                    {{ $project->house_number . ' ' . $project->street }}</p><br>
                <strong style="font-size: 14px;">CODE POSTAL ET VILLE:</strong>
                <p style="color: #282826;font-size: 14px; padding:0; margin:0">
                    {{ $project->zip_code . ' ' . $project->city }}</p>
            </div>

        </div>


    </div>


    <!-- Informations du client -->


    <table style="width: 100%; border-collapse: collapse; clear: both;">
        <tr>
            <!-- Première cellule (Rénovation Globale) -->
            <td
                style="background-color: #273373; color: white; width: 25%; padding: 5px; vertical-align: middle; text-align: center; border: 1px solid #273373;">
                <!-- Reduced padding -->
                <div style="text-align: center;">
                    <img src="{{ resource_path('images/logo-repeblique.jpeg') }}" alt="Logo"
                        style="width: 30px; margin-right: 10px; float: left; height: 30px;">
                    <div style="text-align: left"> <!-- Prevents text from wrapping under the image -->
                        <strong style="font-family: 'Poppins', sans-serif; font-weight: 600;">Rénovation
                            Globale</strong><br>
                        <strong style="font-family: 'Poppins', sans-serif; font-weight: 600;">Ampleur</strong><br>
                        <strong style="font-family: 'Poppins', sans-serif; font-weight: 600;">Accompagnée MAR</strong>
                    </div>

                </div>
            </td>

            <!-- Deuxième cellule pour Sauts de Classe Enr. -->
            <td
                style="background-color: white; width: 25%; padding: 5px; vertical-align: top; text-align: center; border: 1px solid #273373;">
                <!-- Reduced padding -->
                <b style="color: #273373;font-size: 16px;">Sauts de Classe Enr.</b><br>
                <span style="color: #282826; font-size: 16px;">{{ $project->class_skip_number }}</span>

            </td>

            <!-- Troisième cellule pour Passoire thermique -->
            <td
                style="background-color: white; width: 25%; padding: 5px; vertical-align: top; text-align: center; border: 1px solid #273373;">
                <!-- Reduced padding -->
                <b style="color: #273373;font-size: 16px;">Passoire thermique:</b><br>
                <span style="color: #282826;font-size: 16px;">{{ $passoir }}</span>
            </td>

            <!-- Quatrième cellule pour Client -->
            <td
                style="background-color: white; width: 25%; padding: 5px; vertical-align: top; text-align: center; border: 1px solid #273373;">
                <!-- Reduced padding -->
                <b style="color: #273373;font-size: 16px;">Client</b><br>
                <span
                    style="color: #282826;font-size: 16px;">{{ $project->projectIncomeClass?->entitled ?? '' }}</span>
            </td>
        </tr>
    </table>

    <div style="border-top: 1px solid #bec1c7; width: 100%; margin:  10px 0;"></div>



    <!-- Tableau des lignes du devis -->
    <table style="width: 100%; background-color: #e7edf2; table-layout: fixed;">
        <tr>
            <th style="width: 40%;">Description</th>
            <th style="width: 10%;">Qté</th>
            <th style="width: 10%;">Unité</th>
            <th style="width: 10%;">PU</th>
            <th style="width: 15%;">Total HTVA</th>
            <th style="width: 15%;">Total TTC</th>
        </tr>
        <tbody>
            @foreach ($invoice->lines as $line)
                <tr>
                    <!-- Colonne Description affichant uniquement la designation -->
                    <td><strong>{{ $line->designation }}</strong></td>
                    <!-- Valeurs dynamiques alignées sur la même ligne -->
                    <td>{{ number_format($line->qty, 2) }}</td>
                    <td>{{ $line->unitData?->entitled ?? '' }}</td>
                    <td>{{ number_format($line->unit_price_HT, 2) }} €</td>
                    <td>{{ number_format($line->amount_HT, 2) }} €</td>
                    <td>{{ number_format($line->amount_TTC, 2, ',', ' ') }} €</td>
                </tr>

                <!-- Ajouter une deuxième ligne pour afficher description_v2 séparément -->
                @if (!empty($line->description_v2[0]['content']))
                    @php
                        // Récupérer le contenu et le diviser en parties gérables
                        $content = $line->description_v2[0]['content'];
                        // Diviser la description en parties pour éviter trop de contenu d'un coup
$descriptionParts = preg_split('/(<p>|<\/p>)/', $content);
                        $maxLength = 500; // Longueur maximale pour une partie
                    @endphp

                    @foreach ($descriptionParts as $part)
                        @if (strlen(strip_tags($part)) > $maxLength)
                            <!-- Si le contenu est trop long, forcer un saut de page -->
                            <tr style="page-break-before: always;">
                                <td colspan="6" style="padding: 5px; page-break-inside: avoid;">
                                    {!! $part !!}
                                </td>
                            </tr>
                        @else
                            <!-- Sinon, afficher le contenu normalement -->
                            <tr>
                                <td colspan="6" style="padding: 5px;">
                                    {!! $part !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>







    <!-- Résumé des totaux -->
    <div
        style="margin-top: 20px; border: 1px solid black; background-color: white; padding: 10px; text-align: left; width: 30%; margin-left: 0;">
        <div style="display: flex; justify-content: space-between;">
            <div style="width: 100%; font-weight: bold; line-height: 1.2;">
                Délai de livraison:
                <span style="float: right; margin-right: 80px;">3 mois</span><br style="clear: both;">
                <span style="margin-top: -5px; display: inline-block;">(A compter de la prime accordée)</span>
            </div>
            <div style="width: 40%; font-weight: bold; white-space: nowrap;">
                Devis valable jusqu'au:
                {{ $invoice?->delivery_time ? Carbon\Carbon::parse($invoice->delivery_time)->format('d/m/Y') : '' }}
            </div>


        </div>
    </div>
    <div style="padding: 5px; text-align: right; position: relative; margin-top: -100px;">
        <div
            style="background-color: #d7e2b7; color: #282826; padding: 5px; width: 50%; float: right; text-align: left;">
            <p>
                <b style="font-size: 14px;">TOTAL HT :</b>
                <span style="float: right;"><strong>{{ number_format($invoice->HT_total, 2, ',', ' ') }}
                        €</strong></span><br>
            </p>
            <b style="font-size: 14px;">Montant TVA :</b> <span
                style="float: right;"><strong>{{ number_format($invoice->TVA_total, 2, ',', ' ') }}
                    €</strong></span><br>
            <b style="font-size: 14px;">Total TTC :</b> <span
                style="float: right;"><strong>{{ number_format($invoice->TTC_total, 2, ',', ' ') }}
                    €</strong></span><br>
            <b style="font-size: 14px;">MaprimeRénov'Parcours accompagné:</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;<strong>{{ number_format(round($invoice?->prime_renov_bonification, 2), 2, ',', ' ') ?? '0' }}
                €</strong><br>
            <b style="font-size: 14px;">Reste à payer à la charge:</b> <span
                style="float: right;"><strong>{{ number_format(round($invoice?->TTC_rest, 2), 2, ',', ' ') ?? '0' }}
                    €</strong></span>
        </div>
    </div>




    <!-- Footer -->




    <!-- Footer -->
    <div class="footer">
        <p class="footer-text">
            Toute somme non payée à sa date d'exigibilité produira de plein droit des intérêts de retard équivalents au
            triple du taux d'intérêts légal de l'année en cours ainsi que le paiement d'une somme de 40€ due au titre
            des
            frais de recouvrement. Dans le cas où l’aide notifiée au client est inférieure au montant de l’aide
            prévisionnelle, l’usager n’est pas lié par le devis et l’entreprise s’engage à proposer un devis
            rectificatif. Le client conserve
            alors un droit de rétractation d’une durée de quatorze jours à partir de la date de présentation du devis
            rectificatif. L’aide MaPrimeRénov’ est conditionnelle et soumise à la conformité des pièces justificatives
            et informations déclarées par le bénéficiaire. En cas de fausse déclaration, de manœuvre frauduleuse ou de
            changement du projet de travaux subventionnés, le bénéficiaire s’expose au retrait et reversement de tout ou
            partie de l’aide. Les services de l’Anah pourront faire procéder à tout contrôle des
        </p>
        <p class="footer-text-center">engagements et sanctionner le bénéficiaire et son mandataire éventuel des
            manquements constatés.</p>
        <p class="remerciement">Nous vous remercions de votre confiance.</b>
        <div class="footer-info">
            <p class="footer-info-text">
                {{ $installateur?->trade_name ?? '' }} - {{ $installateur?->address ?? '' }} -
                {{ $installateur?->zip_code . ', ' . $installateur?->city ?? '' }} -
                SARL au capital de {{ $installateur?->capital ?? '0' }} euros
            </p>
            <p class="footer-info-text">
                RCS : {{ $installateur?->siret ?? '' }} - N° TVA : {{ $installateur?->identifiant_tva ?? '' }} -
                APE : {{ $installateur?->num_ape ?? '' }}
            </p>
        </div>

    </div>





</body>

</html>
