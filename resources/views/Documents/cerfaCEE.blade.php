<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ATTESTATION D’EXCLUSIVITÉ
        DU PROFESSIONNEL</title>
    <style>
        @page {
            margin-top: 50px;
            margin-bottom: 20px;
            margin-right: 60px;
            margin-left: 60px;
        }

        body {
            font-family: "Trebuchet MS", Tahoma, sans-serif;
        }

        p {
            font-size: 12.5px;
        }

        .block {
            width: 80px;
            height: 30px;
            background-color: #ff5624;
            border-radius: 5px;
        }

        .rotatedN {
            transform: rotate(-90deg);
            position: absolute;
            top: 98%;
            right: 102%;
            font-size: 8px;
        }
    </style>
</head>

<body>
    <div class="block" style="position: absolute; top:98%; right:105%"></div>
    <div class="block" style="position: absolute; top:58%; right:105%"></div>
    <div class="block" style="position: absolute; top:62%; right:105%"></div>
    <div class="block" style="position: absolute; top:66%; right:105%"></div>
    <div class="block" style="position: absolute; top:70%; right:105%"></div>
    <div class="block" style="position: absolute; top:74%; right:105%"></div>
    <div class="block" style="position: absolute; top:78%; right:105%"></div>
    <div class="block" style="position: absolute; top:82%; right:105%"></div>
    <div class="block" style="position: absolute; top:86%; right:105%"></div>
    <div class="block" style="position: absolute; top:90%; right:105%"></div>
    <div class="block" style="position: absolute; top:94%; right:105%"></div>
    <div class="rotatedN"><span>05/15</span></div>
    <div>
        <img src="{{ resource_path('images/logo-agence.png') }}" alt="" style="width: 120px;">
        <img src="{{ resource_path('images/logo-habiter.jpg') }}" alt=""
            style="width: 110px;position: relative;top:10px;left:25px;">
        <img src="{{ resource_path('images/edf.png') }}" alt=""
            style="width: 100px;position: relative;top:-5px;left:30px;">
        <img src="{{ resource_path('images/engie.png') }}" alt=""
            style="width: 100px;position: relative;top:-15px;left:40px;">
        <img src="{{ resource_path('images/total.png') }}" alt=""
            style="width: 100px;position: relative;top:-28px;left:50px;">
        <img src="{{ resource_path('images/cerfa_noir.png') }}" alt=""
            style="width: 75px;position: relative;top:25px;left:40px;">
    </div>
    <div>
        <p style="font-weight: bold;color:#ff5624;font-size:15.5px;">
            Habiter Mieux - Certificats d’économies d’énergie
        </p>
        <p style="color:#88c946;font-size:21px;margin-top:-5px;">
            ATTESTATION D’EXCLUSIVITÉ <br>
            DU PROFESSIONNEL
        </p>
        <table style="border: 1px solid #ff5624;width:50%;padding-left:10px;margin-top:-60px;margin-left:350px;">
            <tr>
                <td>
                    <p style="color: #ff5624;margin-bottom:-10px;font-size:10px;margin-top:2px;">
                        Réservé à l’Anah
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-bottom:-10px;font-size:11px;">
                        DÉLÉGATION
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size:11px;margin-bottom:2px;">
                        N° de dossier
                    </p>
                </td>
            </tr>

        </table>
    </div>
    <div style="margin-top:60px;">
        <p>
            Madame, Monsieur,
        </p>
        <p>
            Grâce au programme Habiter Mieux, une aide financière vous a été accordée pour faire réaliser chez vous des
            travaux d’économies d’énergie.
            Pour ce programme, l’Anah a un droit d’exclusivité pour l’enregistrement des certificats d’économies
            d’énergie issus de ces travaux financés.
            Pour recevoir le paiement de cette aide, vous devez <b>impérativement faire remplir et faire signer une
                attestation d’exclusivité
                à chaque professionnel (artisan, entreprise, maître d’œuvre)</b> qui a réalisé vos travaux. Une fois
            remplie(s) et signée(s), conservez
            cette(ces) attestation(s).Vous l’(les) enverrez à l’Anah en même temps que les factures de vos travaux.
        </p>
        <p style="margin-top:-5px;">
            Attention, <b>cette attestation est obligatoire</b> sinon l’aide accordée sera annulée.
        </p>
        <p style="margin-top:-5px;margin-bottom:60px;">
            Bon à savoir : si une aide vous a été accordée personnellement, en tant que copropriétaire, pour des travaux
            dans les parties communes de
            votre copropriété, vous n’avez pas besoin de joindre cette attestation. Si l’ensemble de votre copropriété
            bénéficie d’une aide Habiter Mieux, les
            attestations d’exclusivité seront directement demandées à votre syndic.
        </p>
    </div>
    <div>
        <table style="width: 100%;border:1px solid;padding-left:5px;page-break-inside:avoid;">
            <tr>
                <td>
                    <p>
                        Je soussigné(e),
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        M. et/ou Mme
                        {{ $project->company->representative_first_name . ' ' . $project->company->representative_last_name }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        représentant de l’entreprise {{ $project->company?->trade_name }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        N° SIREN : {{ $project->company->siret_without_space }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-5px;">
                        1. atteste avoir mis en œuvre une opération d’économies d’énergie dans le cadre du programme
                        Habiter Mieux :
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        Nom du maître d’ouvrage des travaux, bénéficiaire des aides du programme Habiter Mieux
                        {{ $project->installer?->company?->trade_name }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        Adresse du logement ou de l’immeuble objet de l’aide {{ $project->address }},
                        {{ $project->city }}, {{ $project->zip_code }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        2. atteste sur l’honneur que je fournis exclusivement à l’Anah l’ensemble des documents
                        permettant de valoriser cette opération
                        au titre du dispositif des certificats d’économies d’énergie (facture) et que je ne signerai de
                        documents similaires avec aucun
                        autre acteur dans le cadre de ce dispositif
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        3. atteste sur l’honneur l’exactitude des informations figurant sur les factures et communiquées
                        à l’Anah sur les caractéristiques
                        techniques relatives à l’opération d’économies d’énergie
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-10px;">
                        4. suis informé(e) que je suis susceptible d’être contacté par les services de l’Anah ou du
                        ministère chargé de l’énergie dans le
                        cadre d’un contrôle concernant la nature des travaux et la réalisation effective de ceux-ci.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-top:-5px;">
                        Fait à {{ $project->city }} le {{ now()->format('d/m/Y') }},
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p
                        style="margin-top:-5px;color:#ff5624;@if (!$project->company->signature) padding-bottom:50px; @endif">
                        Cachet et signature du professionnel :
                    </p>
                    @if ($project->company->signature)
                        <p>
                            <img src="{{ storage_path('app/' . $project->company->signature) }}"
                                style="width: auto;height:70px;" alt="">
                        </p>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
