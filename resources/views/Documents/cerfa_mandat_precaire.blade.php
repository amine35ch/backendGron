<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cerfa_15923-01 mandat Précaire Energia</title>
    <style>
        body {
            font-family: "Trebuchet MS", Tahoma, sans-serif;
        }

        @page {
            margin-top: 20px;
        }

        .dot li {
            list-style: none;
            /* Removes default list styling */
            position: relative;
            /* Ensures pseudo-element positioning relative to li */
        }

        .dot li::before {
            content: "• ";
            color: #f9a51b;
            /* Or whatever color you prefer */
            font-size: 25px;
            /* Adjust size of the bullet */
            position: absolute;
            /* Position the bullet absolutely */
            left: -25px;
            /* Adjust the position to align with list item text */
            top: -5px;
            /* Adjust based on the font size and line height */
        }


        .line li {
            list-style: none;
            /* Removes default list styling */
            position: relative;
            /* Ensures pseudo-element positioning relative to li */
        }

        .line li::before {
            content: "- ";
            font-size: 15px;
            /* Adjust size of the bullet */
            position: absolute;
            /* Position the bullet absolutely */
            left: -8px;
            /* Adjust the position to align with list item text */
            top: -2px;
            /* Adjust based on the font size and line height */
        }

        .block {
            width: 45px;
            height: 30px;
            background-color: #f9a51b;
            border-radius: 5px;
        }

        .line_1 {
            border-top: 0.5px solid #f9a51b;
            /* Creates a horizontal line */
            width: 100%;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the line */
        }
    </style>
</head>

<body>

    <div>
        <table style="width: 105%;">
            <tr>
                <td style="width: 20%;">
                    <img src="{{ resource_path('images/agence-nationale.png') }}" alt="Agence"
                        style="width: 135px;height:auto;">
                </td>
                <td style="width: 20%;">
                    <img src="{{ resource_path('images/monprojet.anah.png') }}" alt="monprojet.anah"
                        style="width: 200px;height:auto;">
                </td>
                <td style="width: 40%;"></td>
                <td style="width: 20%;">
                    <img src="{{ resource_path('images/logo-habiter.jpg') }}" alt="HABITER"
                        style="width: 130px;height:auto;">
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table style="width: 100%;">
            <tr>
                <td style="width: 10%;vertical-align:middle;">
                    <img src="{{ resource_path('images/cerfa.jpg') }}" alt="cerfa" style="width: 100px;height:auto;">
                </td>
                <td style="width: 76%;font-size: 18px;font-weight: bold;">
                    MANDAT POUR LA CONSTITUTION D’UNE DEMANDE D’AIDE
                    EN LIGNE - PROPRIETAIRE OCCUPANT
                </td>
                <td style="width: 12%;"></td>
            </tr>
        </table>
    </div>
    <div style="margin-top:-15px;margin-left:107px;">
        <p style="font-size:11px;">
            Articles 1984 et suivants du code civil
        </p>
    </div>

    <div style="margin-left:30px;margin-top:-10px;">
        <p style="font-weight:bold;font-size:13px;">
            Je, soussigné(e) :
        </p>

        <p style="font-size:12px;margin-top:-7px;">
            M. <input type="checkbox" style="position: relative;top:5px;margin-right:5px;"
                @if ($project->client->gender == App\Enums\DClientEnum\DClientGender::Male->value) checked @endif>
            ou Mme <input type="checkbox" style="position: relative;top:5px;margin-right:5px;"
                @if ($project->client->gender == App\Enums\DClientEnum\DClientGender::Female->value) checked @endif>
        </p>
        <p style="margin-top:-7px;">
            <span style="font-size:12px;">
                Nom : <span>{{ $project->client->last_name }}</span>
            </span>
            <span style="font-size:12px;margin-left:30px;">
                Prénom : <span>{{ $project->client->first_name }}</span>
            </span>
        </p>
        <p style="font-size:12px;margin-top:-12px;">
            <input type="checkbox" style="position: relative; top: 5px; margin-right: 2px;"
                @if ($project->project_nature === 0) checked @endif> Propriétaire

            <input type="checkbox" style="position: relative; top: 5px; margin-right: 2px; margin-left: 30px;"
                @if ($project->project_nature !== 0 && $project->project_nature !== null) checked @endif> Autre (préciser) :

            <span style="color: #939598;">
                @if ($project->project_nature !== 0 && $project->project_nature !== null)
                    {{ $project->projectNature?->entitled }}
                @endif
            </span>

            </span>
        </p>
        <p style="font-size:12px;margin-top:-6px;">
            du logement à rénover sis au (indiquer l’adresse complète, y compris s’il y en a, les numéros de bâtiments
            et/ ou d’étages) : <br>
            <span>{{ $project->client->address . ' ' . $project->client->zip_code . ' ' . $project->client->city }}</span>
        </p>
        <p style="font-size:12px;margin-top:-6px;">
            mail: <span>{{ $project->client->email_anah }}</span> <span style="margin-left:35px;">tél (mobile et/ ou
                fixe):</span> <span>{{ $project->client->phone_number_1 }}</span>
        </p>
    </div>

    <div style="margin-left:30px;margin-top:-5px;">
        <p style="font-weight:bold;font-size:12px;">
            Donne mandat à :
        </p>
        <p style="font-size:12px;margin-top:-7px;">
            M. <input type="checkbox" style="position: relative;top:5px;margin-right:5px;"
                @if ($project->mandataire_company?->representative_gender == App\Enums\DClientEnum\DClientGender::Male->value) checked @endif> ou Mme <input type="checkbox"
                style="position: relative;top:5px;margin-right:5px;" @if ($project->mandataire_company?->representative_gender == App\Enums\DClientEnum\DClientGender::Female->value) checked @endif>
            (si personne morale, nom-prénom du représentant ayant délégation de signature)
        </p>
        <p style="margin-top:-7px;">
            <span style="font-size:12px;">
                Nom : <span>{{ $project->mandataire_company?->representative_last_name }}</span>
            </span>
            <span style="font-size:12px;margin-left:30px;">
                Prénom : <span>{{ $project->mandataire_company?->representative_first_name }}</span>
            </span>
        </p>
        <p style="font-size:12px;margin-top:-7px;">
            Raison sociale (si personne morale): <span>{{ $project->mandataire_company?->trade_name }}</span>
        </p>
        <p style="font-size:12px;margin-top:-7px;">
            adresse complète :
            <span>{{ $project->mandataire_company?->address . ' ' . $project->mandataire_company?->zip_code . ' ' . $project->mandataire_company?->city }}</span>
        </p>
        <p style="font-size:12px;margin-top:-7px;">
            mail: <span>{{ $project->mandataire_company?->email }}</span> <span style="margin-left:35px;">tél (mobile
                et/ ou fixe):</span> <span>{{ $project->mandataire_company?->phone_number_1 }}</span>
        </p>
    </div>

    <div style="margin-left:30px;">
        <p style="font-weight:bold;font-size:12px;">
            Pour effectuer en mon nom et pour mon compte les démarches suivantes sur monprojet.anah.gouv.fr :
        </p>
        <p style="font-weight:bold;font-size:12px;margin-top:-3px;">
            <span style="font-size: 12.5px;">DEMANDE D’AIDE</span> (à cocher si le mandat porte sur cette demande)
        </p>
    </div>

    <div style="margin-left: 30px;margin-top:-7px;">
        <table style="width: 100%">
            <tr>
                <td style="width: 2%;vertical-align:center;"><input type="checkbox"
                        style="position: relative;top:5px;margin-right:5px;" checked></td>
                <td style="font-weight: bold;font-size:12px;">
                    Je donne mandat pour la constitution de mon dossier de demande d’aide, le dépôt EN LIGNE de ma
                    demande ainsi que la réception et le traitement de toute correspondance avec l’Anah et ses services.
                </td>
                <td style="width: 5%"></td>
            </tr>
        </table>

    </div>

    <div style="margin-left:30px;margin-top:-7px;">
        <p style="font-size:11.5px">
            Dans le cas où ma demande d’aide est déposée,
        </p>
    </div>

    <div style="margin-left:10px;margin-top:-20px;">
        <ul class="dot">
            <li style="font-weight:bold;font-size:12px;">
                J’ATTESTE:
            </li>
        </ul>
        <ul class="line" style="margin-left:-17px;margin-top:-10px;line-height: 1.5;">
            <li style="font-size:11.5px;">
                ne pas avoir commencé les travaux avant le dépôt en ligne de la demande d’aide auprès de l’Anah par le
                mandataire désigné,
            </li>
            <li style="font-size:11.5px;">
                que je n’ai pas acheté mon logement à un organisme HLM depuis moins de cinq ans.
            </li>
        </ul>

        <ul class="dot" style="margin-top:25px;">
            <li style="font-weight:bold;font-size:12px;">
                JE SUIS INFORMÉ(E) QUE CELA M’ENGAGE À:
            </li>
        </ul>

        <ul class="line" style="margin-left:-17px;line-height: 1.5;margin-top:-15px;">
            <li style="font-size:11.5px;">
                <span style="font-weight:bold;">commencer les travaux dans un délai de un an </span> suivant la date
                d’attribution de l’aide
            </li>
            <li style="font-size:11.5px;">
                faire réaliser les travaux par des entreprises du bâtiment ayant une activité déclarée en rapport avec
                les travaux effectués (<span style="font-weight: bold;">pose et
                    fourniture des matériaux et équipements réalisés par ces dernières</span>), sauf en cas
                d’auto-réhabilitation accompagnée par un
                opérateur spécialisé,
            </li>
            <li style="font-size:11.5px;">
                <span style="font-weight:bold;"><span style="font-weight:bold;">terminer les travaux</span> et présenter
                    ma <span style="font-weight:bold;">demande de paiement du solde</span> de l’aide <span
                        style="font-weight:bold;">dans le délai de trois ans</span> suivant la date
                    d’attribution de l’aide,
            </li>
            <li style="font-size:11.5px;">
                <span style="font-weight:bold;">occuper mon logement amélioré pendant au moins 6 ans à titre de
                    résidence principale</span> suivant la date de réception
                par l’Anah de la demande de paiement du solde de l’aide.
            </li>
        </ul>

        <p style="font-size:11.5px;margin-left:24px;">
            Si vous n’occupez pas encore le logement amélioré, vous avez jusqu’à un an suivant la demande de solde pour
            y entrer.
        </p>
        <p style="font-size: 11.5px;margin-left:24px;">
            Si vous supportez la charge des travaux mais n’occupez pas le logement amélioré, l’obligation d’occuper au
            moins six ans le logement
            à compter de la demande de solde pèse sur les occupants propriétaires ou sur le ménage modeste que vous
            hébergez à titre gratuit.
        </p>
    </div>
    <div style="position: absolute; top:100%;left:98%;">
        <table style="border: #f9a51b solid 1px;">
            <tr>
                <td>
                    <p style="color: #f9a51b;margin-top:-5px;margin-bottom:-5px;">1</p>
                </td>
            </tr>
        </table>
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

    <div style="page-break-before: always; ">

        <ul class="line" style="margin-left:-17px;line-height: 1.5;">
            <li style="font-size:11.5px;">
                pendant cette période de <span style="font-weight:bold;">six ans</span>, informer l’Anah par écrit et
                dans les deux mois de toute <span style="font-weight:bold;">modification du droit de propriété</span>
                du logement amélioré (vente, mutation etc.) ou de ses conditions d’occupation (transformation en bureau,
                résidence secondaire, mise en
                location etc…),
            </li>
            <li style="font-size:11.5px;">
                lorsque le projet comporte des <span style="font-weight:bold;">travaux d’amélioration de la performance
                    énergétique :</span>
            </li>
        </ul>

    </div>

    <div style="margin-left:70px;margin-top:20px;">
        <p style="font-size:11px;font-weight:bold;">
            Pour la prime Habiter Mieux sérénité :
        </p>
        <p style="font-size:11px;margin-left:30px;">
            <b>•</b> exiger de chaque entreprise ou professionnel réalisant les travaux qu’il fournisse une
            <b>attestation d’exclusivité</b>
            (Cerfa n° 15 347) permettant la valorisation des CEE exclusivement par l’Anah, qui a eu un rôle actif et
            incitatif dans la
            réalisation du projet de travaux subventionné (ces attestations devront être obligatoirement fournies à
            l’Anah pour obtenir le
            paiement de l’aide),
        </p>
        <p style="font-size:11px;margin-left:30px;margin-top:-10px;">
            <b> • ne pas signer de document similaire</b> permettant la valorisation des <b>CEE</b> par un autre acteur
            (entreprise de travaux,
            fournisseur de matériaux, établissements de crédit etc.), sous peine de retrait de l’aide et de reversement
            des sommes
            déjà perçues,
        </p>
        <p style="font-size:11px;margin-left:30px;margin-top:20px;">
            <b>Pour Habiter Mieux agilité,</b> recourir à des entreprises qualifiées « <b>RGE</b> » (Reconnues Garantes
            de l’Environnement) pour
            effectuer les travaux.
        </p>
    </div>
    <div style="margin-left:10px;margin-top:-20px;">
        <ul class="dot">
            <li style="font-weight:bold;font-size:12px;">
                JE RECONNAIS ÊTRE INFORMÉ(E) QUE:
            </li>
        </ul>

        <ul class="line" style="margin-left:-17px;line-height: 1.5;margin-top:-15px;margin-top:15px;">
            <li style="font-size:11.5px;">
                l’Anah peut effectuer des <b>contrôles</b> (visite du logement, notamment pour vérifier la nature des
                travaux et
                la réalisation effective de
                ceux-ci, demande d’informations complémentaires, vérification de l’occupation du logement …) pendant les
                six ans de période obligatoire
                d’occupation du logement
            </li>
            <li style="font-size:11.5px;">
                <b>en cas de non-respect de ces engagements et de la règlementation en vigueur ou en cas de fraude,</b>
                l’aide attribuée est
                annulée et les sommes déjà perçues devront être remboursées avec une majoration,
            </li>
            <li style="font-size:11.5px;">
                <b>toute fraude ou fausse déclaration</b> expose également à des sanctions financières et
                administratives, ainsi qu’à des poursuites judiciaires.
            </li>
        </ul>
    </div>

    <div style="margin-left:30px;">
        <p style="font-weight:bold;font-size:12px;margin-top:-3px;">
            <span style="font-size: 12.5px;">DEMANDE DE PAIEMENT</span> (à cocher si le mandat porte sur cette demande)
        </p>
    </div>

    <div style="margin-left: 30px;margin-top:-7px;">
        <table style="width: 100%">
            <tr>
                <td style="width: 2%;vertical-align:center;"><input type="checkbox"
                        style="position: relative;top:5px;margin-right:5px;" checked></td>
                <td style="font-weight: bold;font-size:12px;">
                    Je donne mandat pour la constitution et le dépôt de toute(s) demande(s) EN LIGNE de paiement
                    (avance, acompte, solde) ainsi que, le cas échéant, le traitement des correspondances avec l’Anah
                    et ses services la (les) concernant.
                </td>
                <td style="width: 5%"></td>
            </tr>
        </table>
    </div>

    <div style="margin-left:30px;margin-top:-10px;">
        <p style="font-size:11.5px;">
            • Dans le cas d’une demande d’avance, je m’engage à commencer les travaux dans les six mois suivant la date
            d’attribution de l’aide.
        </p>
        <p style="font-size:11.5px;">
            • Dans le cas d’une demande de solde, je reconnais être informé(e) que mon engagement d’occuper mon logement
            pendant au moins
            six ans court à compter du dépôt de cette demande.
        </p>
    </div>

    <div style="margin-left:10px;margin-top:25px;">
        <ul class="dot">
            <li style="font-size:12px;">
                INFORMATIONS COMPLEMENTAIRES :
            </li>
        </ul>
    </div>
    <div style="margin-left:30px;margin-top:-20px;">
        <p style="font-size:11.5px;">
            Le mandant conserve l’original du présent mandat et en fournit une copie à son mandataire qui devra le
            télé-verser dans monprojet.anah.gouv.fr.
            Il ne peut y avoir qu’un seul mandataire actif à la fois pour intervenir <b>à votre place</b> sur
            monprojet.anah.gouv.fr1.
        </p>
        <p style="font-size:11.5px;margin-top:-10px;">
            Quand vous donnez un mandat pour effectuer les démarches relatives aux demandes de paiement, <b>le versement
                de l’aide est effectué
                sur votre compte bancaire. Si vous souhaitez que l’aide soit versée à une autre personne que vous-même,
                vous devez
                remplir le formulaire « Procuration pour la perception des fonds »</b> disponible sur anah.fr dans la
            rubrique Propriétaires Occupants.
        </p>
    </div>
    @php
    $signatureDate=\Carbon\Carbon::parse($project?->visits->where('type',0)->first()?->visit_date)->format('d/m/Y') ?? now()->format('d/m/Y')
    @endphp
    <div style="margin-left:30px;">
        <p style="font-size:11px;">
            Fait à <span>{{ $project->client->city }}</span> <span style="margin-left:10px;">,le</span>
            <span>{{ $signatureDate }}</span>
        </p>
    </div>

    <div style="margin-top:20px;">
        <table style="width: 100%">
            <tr>
                <td style="width: 4%;font-size:11px;">

                </td>
                <td style="width: 42%;font-size:11px;vertical-align:top;">Signature du <b>MANDANT</b>, bénéficiaire de
                    l’aide</td>
                <td style="width: 12%"></td>
                <td style="width: 42%;font-size:11px;">Signature du <b>MANDATAIRE</b>, qui s’engage à communiquer
                    au mandant tous les éléments d’information concernant ses
                    démarches sur monprojet.anah.gouv.fr</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">
                    @if (isset($project->client->signature))
                        <img src="{{ storage_path($project->client->signature) }}" alt="Agence"
                            style="width: 100px;height:auto;">
                    @endif
                </td>
                <td></td>
                <td style="text-align: center;">
                    @if (isset($project->mandataire_company?->signature))
                        <img src="{{ storage_path('app/' . $project->mandataire_company?->signature) }}"
                            alt="Agence" style="width: 100px;height:auto;">
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <div style="position: absolute; top: 95%; width: 90%;">
        <section class="line_1" style="margin-left:20px;"></section>
        <p style="font-size:9.5px;margin-left:20px;">
            <b>1.</b> Vous pouvez choisir des mandataires différents : un pour constituer et déposer votre demande
            d’aide ; un autre pour constituer et déposer vos demandes de paiement. Dans ce cas, les mandats
            se succèdent (il ne peut y avoir deux mandataires en même temps).
            Vous pouvez aussi choisir un mandataire recevant directement un mandat global pour constituer et déposer à
            la fois vos demandes d’aide et celles de paiement en cochant les deux cases
            « DEMANDE D’AIDE » et « DEMANDE DE PAIEMENT ».
        </p>
    </div>
    <div style="position: absolute; top:101%;right:98%;">
        <table style="border: #f9a51b solid 1px;">
            <tr>
                <td>
                    <p style="color: #f9a51b;margin-top:-5px;margin-bottom:-5px;">2</p>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
