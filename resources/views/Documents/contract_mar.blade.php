<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contract</title>

</head>
<style>
    body {
        font-family: "Calibri", sans-serif !important;
    }

    p {
        font-size: 13px;
        text-align: justify;
        font-family: "Calibri", sans-serif !important;
        line-height: 1.4;

    }

    @page {
        margin-left: 90px;
        margin-right: 90px;
    }

    .line {
        list-style: none;
    }

    .line li:before {
        content: '-';
        font-family: DejaVu Sans, 'Cambria', sans-serif !important;
        font-size: 13px;
    }

    span {
        font-family: "Calibri", sans-serif !important;
        font-size: 13px;
    }

    .number {
        font-size: 17px;
        line-height: 1.5;
        display: inline-block;
        width: 100%;
    }

    .dotted_line {
        border-bottom: 2px dotted #000000;
    }

    .border-top {
        position: absolute;
        top: -9%;
        right: -14%;
        border-top: 95px solid #85a039;
        /* background: rgb(23,28,4); */
        /* background: linear-gradient(90deg, rgba(23,28,4,1) 0%, #85a039 35%, rgba(133,160,57,1) 100%); */
        width: 130%;
        /* Adjust this width according to your requirement */
        height: 300px;
        /* Adjust this height according to your requirement */
        /* transform: rotate(-180deg); */
        /* transform-origin: top left; */
        border-bottom-left-radius: 50% 20%;

    }

    .image-border-top {
        height: 200px;
        width: 100%;
        margin-top: -50px;
        z-index: -99;

    }

    .border-bottom {
        position: absolute;
        top: 100%;
        left: -10%;
        border-top: 100px solid #85a039;
        width: 120%;
        height: 200px;
    }

    .logo_block {
        position: absolute;
        top: -10%;
        right: 80%;
        background-color: #85a039;
        border-radius: 70px;
        width: 200px;
        height: 300px;
        border-radius: 0 0 0 200px;
        transform: rotate(-90deg);
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-left: 20px;
    }

    th,
    td {
        padding: 2px;
        text-align: center;
        border: 1px solid #0a0a0a;
        font-size: 12px;
    }

    .total-row {
        font-weight: bold;
    }

    thead tr th {
        border-top: none;
    }

    tbody tr:first-child td {
        border-top: none;
    }

    td:first-child,
    th:first-child {
        width: 30%;
    }

    .div1,
    .div2 {
        display: inline-block;
        width: 45%;
        background-color: #DAE3F3;
        vertical-align: top;
        border: 1.5px solid #DAE3F3;
        margin-right: 2%;
    }

    .div2 {
        margin-right: 0;
    }

    .content {
        height: 150px;
        background-color: #DAE3F3;
        text-align: center;
    }

    th:empty td:empty {
        border: none;
    }

    th:nth-child(2) {
        border-left: none;
    }
</style>

<body>
    @php
use App\Enums\DClientEnum\DClientGender;
    @endphp

    <div>
        <img src="{{ resource_path('images/mar-conseil.png') }}" style="position:absolute;top:5%;left:-2%;width:100%">

        <p
            style="position: relative; top:10%; right:2%; text-align:center; font-size:25px; color:black; font-weight: bold; text-decoration: underline;line-height:1.8">
            Mission d'assistance à maitrise d'ouvrage <br>
            Mon accompagnateur Rénov' <br>
            N° contrat : <span
                style= "position: relative;font-size:25px; color:black; font-weight: bold; text-decoration: underline;"class="{client_ref}">{{ $project->contractReference }}</span>
        </p>
        <br><br>
        <div style="position: relative; margin-left: 5%; color: black;">

            <p style="position: relative;top:10%;text-align:left;color:black">
                Le présent contrat, pour une mission d'assistance à maitrise d'ouvrage, est établi entre :
            </p>
            <br>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Le Maître d'ouvrage :
                <span
                    class="{mrORMme}">{{ $project->client->gender !== null ? (DClientGender::Female->value == $project->client->gender ? 'Mme' : 'M.') : 'Mme ou M.' }}</span>:
                <span
                    class="{client_name}">{{ $project->client->first_name . ' ' . $project->client->last_name }}</span>

            </p>
            <br>

            <p style="position: relative;top:10%;text-align:left;color:black">
                Domicilié : <span
                    class="{client_address}">{{ $project->client?->address . ' ' . $project->client?->zip_code . ' ' . $project->client?->city }}</span>

            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Tél : <span class="{client_number}">{{ $project->client->phone_number_1 }}</span>

            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                E-Mail : <span> {{ $project->client->email_anah ? $project->client->email_anah : $project->client->email_contact}}</span>
            </p>
            <br>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Ci-après dénommée le « BENEFICIAIRE », d'une part, Et <br><br>
                ENERGIES AUDITS CONSEILS
            </p>
            <br>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Représentée par son Président : <span
                    class="{company_name}">{{ $project->company->trade_name }}</span><br>
            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Dont le siège social se situe <span
                    class="{company_address}">{{ $project->company->address . ' ' . $project->company->zip_code . ' ' . $project->company->city }}</span>

            </p>

            <p style="position: relative;top:10%;text-align:left;color:black">
                Siren : <span class="{company_siret}">{{ $project->company->siren }}</span> <br>
            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Tél :<span class="{company_approval_number}">{{ $project->company->phone_number_1 }}</span>
            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                E-mail :<span class="{company_email}"> {{ $project->company->email }}</span>
            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Ci-après dénommée le « PRESTATAIRE », d'autre part.
            </p>
            <p style="position: relative;top:10%;text-align:left;color:black">
                Le PRESTATAIRE et le BENEFICIAIRE seront séparément ou conjointement dénommés la ou les <br>
                « Partie(s) ».
            </p>


        </div>
    </div>
    <div style="page-break-before: always"></div>
    <div style="margin-left: 2%;">
        <h1
            style="text-align: center; font-size: 27px; color:black; font-family: 'Open Sans', sans-serif;font-weight: 400;">
            SOMMAIRE DE LA PRESTATION
        </h1>
        <br><br><br><br><br>
        <span class="number">1 ............................OBJET DE LA PRESTATION</span><br>
        <span class="number">2 ............................CONTENU DE LA PRESTATION</span><br>
        <span class="number">3 ............................REALISATION DE LA PRESTATION</span><br>
        <span class="number">3.1 .........................Obligations des Parties</span><br>
        <span class="number">3.2..........................Modalités de la collaboration </span><br>
        <span class="number">3.3..........................Les livrables de la mission</span><br>
        <span class="number">4............................REVISION DU CONTRAT</span><br>
        <span class="number">5............................DUREE ET FIN DE CONTRAT</span><br>
        <span class="number">5.1.........................Durée et fin de contrat</span><br>
        <span class="number">5.2 ........................Planning du contrat </span><br>
        <span class="number">6............................RESILIATION</span><br>
        <span class="number">7............................PROPOSITION FINANCIERE</span><br>
        <span class="number">7.1.........................Honoraires</span><br>
        <span class="number">7.2.........................Validité de l'offre </span><br>
        <span class="number">8............................PAIEMENT DE LA PRESTATION</span><br>
        <span class="number">8.1.........................Conditions de paiements</span><br>
        <span class="number">8.2.........................Règlement</span><br>
        <span class="number">9............................RESPONSABILITE- ASSURANCE</span><br>
        <span class="number">10..........................DISPOSITIONS GENERALES </span><br>
        <span class="number">11..........................PROPRIETE INTELLECTUELLE</span><br>
        <span class="number">12..........................LOI APPLICABLE ET LITIGES </span><br>
        <span class="number">13..........................TRAITEMENT DES DONNEES PERSONNELLES</span><br>
        <span class="number">14..........................DROIT DE RETRACTATION </span><br>

    </div>
    <div style="page-break-before: always"></div>

    <div style="margin-left: 5%;">
        <h3 style="color: black; margin-left: 10px;margin-top: 50px;">
            <div style="display: inline-block;">1-</div>
            <div style="display: inline-block; text-decoration: underline;">
                OBJET DE LA PRESTATION</div>
        </h3><br>
        <p>La tâche assignée consiste en une mission d'Assistance à la Maîtrise d'Ouvrage (AMO) destinée au
            bénéficiaire qui souhaite entreprendre des travaux visant à améliorer l'efficacité énergétique de son
            logement. Le terme "mission" englobe l'ensemble des services définis dans ce contrat. Cette mission
            englobe les principales étapes suivantes :
        </p>
        <br>
        <p>
            Phase 1 : Aide à la prise de décision, comprenant la réalisation d'un audit énergétique.
        </p>
        <p>
            Phase 2 : Assistance à l'élaboration du projet, à la création du plan de financement, ainsi qu'au <br>
            montage des dossiers de demande de subventions.
        </p>
        <p>
            Phase 3 : Aide à la prise en main du logement rénové.
        </p>
        <p>
            Phase 3 : Aide à la prise en main du logement rénové.
        </p>
        <p>
            En outre, ce contrat spécifie la nature des travaux ainsi que les droits et responsabilités des parties
            impliquées pour assurer son exécution.
        </p>
    </div>
    <div style="margin-left: 5%;">
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">2-</div>
            <div style="display: inline-block; text-decoration: underline;">CONTENU DE LA PRESTATION</div>
        </h3>
        <p style="color: black;text-decoration: underline">Phase 1 : Assistance à la prise de décision</p>
        <p>Constituant un appui à la prise de décision pour le BÉNÉFICIAIRE, dans cette perspective, le <br>
            PRESTATAIRE accomplira les tâches complémentaires suivantes :
        </p>
        <p>
            Fournir au BÉNÉFICIAIRE des informations relatives au dispositif d'aide à l'amélioration de l'habitat,
            aux financements potentiels, aux conditions d'attribution des aides (Anah, collectivités, aides
            sociales, prêts et dispositifs fiscaux), aux obligations du propriétaire, et aux étapes de la procédure
            administrative d'instruction du dossier et d'attribution des aides (délais, autorisation de commencer <br>
            les travaux, etc.).
        </p>
        <p>
            Dispenser des conseils sur les usages et travaux propices à l'amélioration des conditions de vie dans <br>
            le logement.
        </p>
        <p>
            Évaluer les caractéristiques sociales du ménage et ses capacités d'investissement.
        </p>
        <p>
            Effectuer une visite technique du logement, incluant :
        </p>
        <p>
            La collecte des documents disponibles auprès du BÉNÉFICIAIRE.
        </p>
        <p>
            Le relevé sur site et la description du bâti et des installations.
        </p>
        <p>
            L'examen des modes de gestion des énergies.
        </p>
        <p>
            L'identification des contraintes et spécificités pour la réalisation des travaux proposés.
        </p>
        <p>
            L'évaluation simplifiée du niveau de dégradation et d'insalubrité du logement ainsi que du niveau <br>
            d'autonomie du ménage.
        </p>
        <div style="page-break-before: always"></div>
        <div style="margin-top: 40px;">
            <p>
                Analyser l'usage du logement par le ménage et la consommation énergétique effective de ce dernier.

            </p>
            <p>
                Évaluer la consommation énergétique du logement (consommation conventionnelle).
            </p>
            <p>
                Fournir une assistance pour l'identification des besoins de travaux et la rédaction d'une proposition
                <br>
                de programme, éventuellement avec une hiérarchisation des travaux et selon plusieurs scénarios.
            </p>
            <p>
                Estimer le coût des travaux et réaliser des évaluations énergétiques (consommations et gains) pour <br>
                différents scénarios.
            </p>
            <p>
                Estimer l'ensemble des financements mobilisables pour chaque scénario, y compris les aides fiscales.
                Pour les propriétaires bailleurs, les simulations financières doivent intégrer le niveau des loyers <br>
                pratiqués après les travaux.
            </p>
            <p>
                Élaborer et mettre en œuvre l'audit énergétique ainsi que la fiche de synthèse de l'évaluation globale
                <br>
                (avec les différents scénarios) à fournir au propriétaire.
            </p>
            <br>
            <p style="color: black;text-decoration: underline">Phase 2 : Soutien à l'élaboration du projet, à
                l'établissement du plan de financement,
                et à la <br>constitution des dossiers de demande de subventions.</p>
            <p>Dans cette optique, le PRESTATAIRE s'acquittera des missions secondaires suivantes :</p>

            <p>Assistance à l'élaboration du programme définitif de travaux et du plan de financement prévisionnel
                de l'opération.</p>
            <p>Soutien à la consultation d'entreprises et à l'obtention de devis de travaux, comprenant, le cas
                échéant, l'aide à la recherche d'un maître d'œuvre et à la conclusion du contrat de maîtrise d'œuvre.
            </p>
            <p>Conseils au propriétaire dans ses interactions avec le maître d'œuvre éventuel, les artisans et
                entrepreneurs.</p>
            <p>Vérification du contenu des devis et de la conformité de la demande aux critères de l'Agence
                nationale de l'habitat (Anah).</p>
            <p>Sur mandat du demandeur, transmission du dossier de demande à la délégation locale de l'Anah ou
                au délégataire agissant pour le compte du maître d'ouvrage.</p>
            <p>Assistance au suivi de l'opération sur le plan technique.</p>
            <p>Soutien au montage et au dépôt des dossiers de demande de subventions et de prêts, impliquant
                l'aide au remplissage des formulaires par le propriétaire, la vérification de l'exhaustivité du dossier
                et
                de la présence de toutes les pièces techniques nécessaires à la compréhension du projet de travaux,
                ainsi que la collecte des éléments constitutifs du dossier tels que croquis, devis d'entreprises,
                preuves
                de propriété, etc. Le dossier doit inclure le plan de financement prévisionnel détaillant l'ensemble
                des<br>
                aides sollicitées.
            </p>
            <p>Vérification du contenu du dossier et de sa conformité aux critères de l'Anah, des Certificats <br>
                d'Économies d'Énergie (CEE), et des aides locales.
            </p>
            <p>Sur mandat du demandeur, transmission du dossier de demande à la délégation locale de l'Anah ou <br>
                au délégataire agissant pour le compte du maître d'ouvrage.
            </p>
            <p>Assistance au suivi de l'opération sur les plans technique et administratif. </p>
        </div>
    </div>
    <div style="page-break-before: always"></div>
    <div style="margin-top: 40px;">
        <p style="color: black;text-decoration: underline">Phase 3 : Assistance à la prise en main du logement après
            rénovation.</p>
        <p>Dans cette perspective, le PRESTATAIRE accomplira les missions secondaires suivantes : </p>
        <p>Facilitation de la réception des travaux réalisés, incluant la vérification de leur conformité aux
            recommandations, la comparaison avec les factures émises (examen des matériaux utilisés, de leur
            épaisseur, de la présence des membranes d'étanchéité, des systèmes liés au chauffage, à la
            production d'eau chaude, à la ventilation, au refroidissement, ainsi que des finitions pour chaque <br>
            poste).
        </p>
        <p>Assistance à la rédaction des procès-verbaux de réception de fin de travaux .</p>
        <p>Accompagnement pour la prise en main des systèmes installés (régulation, optimisation, etc.). </p>
        <p>Formation aux éco-gestes, englobant l'entretien des isolants et des systèmes, ainsi que les gestes <br>
            quotidiens permettant de réduire les consommations énergétiques.</p>
        <p>Évaluation énergétique post-travaux en cas de modifications par rapport aux travaux initialement <br>
            prévus. </p>
        <p>
            Soutien à l'établissement du plan de financement final de l'opération et communication au maître
            d'ouvrage sur le recalcul éventuel de la subvention lors de la demande de paiement du solde <br>
            (écrêtement, évolution du coût des travaux, etc.).
        </p>
        <p>Assistance à la préparation des différentes demandes de paiement pour chaque financeur : avance
            sur subvention, acomptes, solde. </p>
        <p>Transmission de l'attestation de fin de prestation au BÉNÉFICIAIRE et à l'Anah. </p>
        <br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">3-</div>
            <div style="display: inline-block; text-decoration: underline;">REALISATION DE LA PRESTATION</div>
        </h3>
        <span style="display: block; margin-left: 10px;">3.1- Obligations des parties </span>

        <p>Engagements partagés </p>
        <p>Les parties s'assurent mutuellement d'une collaboration intégrale et s'engagent à coopérer de
            manière honnête tout au long de la réalisation du présent contrat. </p>
        <p>Obligations du PRESTATAIRE </p>
        <p>Le PRESTATAIRE est responsable de l'exécution des services décrits dans la mission susmentionnée. Il
            s'oblige à nommer un référent qui agira en tant qu'interlocuteur privilégié du BÉNÉFICIAIRE pour
            toutes les interactions. Ce référent devra être titulaire d'une formation supérieure dans le domaine
            de la thermique du bâtiment.
        </p>
        <p>Obligations du BENEFICIAIRE </p>
        <p>Le BÉNÉFICIAIRE assume la responsabilité de la maîtrise d'œuvre de coordination pour la mission. Il
            s'oblige à désigner un chef de projet qui agira en tant qu'interlocuteur privilégié du PRESTATAIRE pour
            toutes les interactions. De plus, le chef de projet détient le pouvoir de prendre des décisions
            concernant les questions posées et les solutions proposées par le PRESTATAIRE.
        </p>


    </div>
    <div style="page-break-before: always">

    </div>
    <div style="margin-top:40px;">
        <p>Afin de faciliter la réalisation des services décrits dans le présent contrat, le BÉNÉFICIAIRE s'engage à :
        </p>
        <p>Mettre à la disposition du PRESTATAIRE tous les éléments qu'il jugera nécessaires pour bien
            comprendre le problème et fournir toutes les données pertinentes à l'exécution des services.
        </p>
        <p> Mettre à la disposition du PRESTATAIRE une équipe compétente et disponible pour collaborer aux
            phases d'analyse, valider les différentes étapes, et contribuer à la qualité des livrables.</p>
        <p> Respecter les délais de validation. Dans le cas contraire, le PRESTATAIRE pourra proposer un nouveau
            planning de réalisation en fonction de la disponibilité de ses ressources.</p>
        <p> En résumé, le PRESTATAIRE s'engage à offrir des conseils et à fournir les livrables dans la qualité et les
            délais définis. Le BÉNÉFICIAIRE s'engage à fournir tous les éléments nécessaires pour atteindre les
            résultats attendus.</p>
        <br>
        <span style="display: block; margin-left: 10px;">3.2- Conditions de collaboration </span>
        <p>Equipe projet </p>
        <p>Dans le cadre de la collaboration entre les Parties, les ressources mises à disposition seront : </p>
        <li><span style="display: block; margin-left: 10px;">Pour LE PRESTATAIRE : <span
                    class="{company_name}">{{ $project->company->trade_name }}</span></span></li>
        <br><br><br><br><br>
        <li><span style="display: block; margin-left: 10px;">Pour LE BENEFICIAIRE : <span
                    class="{mrORMme}">{{ $project->client->gender !== null ? (DClientGender::Female->value == $project->client->gender ? 'Mme' : 'M.') : 'Mme ou M.' }}</span>
                <span
                    class="{client_name}">{{ $project->client->first_name . ' ' . $project->client->last_name }}</span></span>
        </li><br><br>

        <span style="display: block; margin-left: 10px;">3.3- Les livrables de la mission </span>
        <p>Chacune des phases de la mission donnera lieu à des livrables définis en collaboration avec les parties
            prenantes du projet. Les avancements du projet seront représentés par les livrables suivants :
        </p>
        <p style="text-decoration: underline">Étape 1: </p>
        <p>Rapport d'audit énergétique </p>
        <p>Fiche de synthèse </p>
        <p style="text-decoration: underline">Étape 2: </p>
        <p>Rapport d'analyse des devis </p>
        <p>Plan de financement </p>
        <p>Plan de travaux définitif </p>
        <p>Dépôt du dossier en ligne sur le site de l'ANAH </p>

    </div>
    <div style="page-break-before: always"> </div>
    <div style="margin-top:40px;">
        <p style="margin-top:-10px;text-decoration: underline">
            Étape 3:
        </p>
        <p>Rapport d'évaluation énergétique modifié (si nécessaire)</p>
        <p style="margin-top:-10px;">
            Plan de financement actualisé (si nécessaire)
        </p>
        <p>Dossier de demande de paiement
        </p>
        <p>Livret de formation aux éco-gestes
        </p>
        <p>Attestation de fin de prestation
        </p>
        <br><br>
        <p> Tous les documents générés par le PRESTATAIRE seront remis au format numérique et, sur demande
            du BÉNÉFICIAIRE, pourront également être remis sous format papier en un exemplaire. À la suite de
            chaque réunion, le BÉNÉFICIAIRE formulera des remarques et pourra solliciter d'éventuels
            compléments en accord avec le cahier des charges.
        </p>
        <p>L'attestation de fin de prestation sera émise au BÉNÉFICIAIRE une fois le règlement effectué pour
            l'ensemble des missions réalisées par le PRESTATAIRE. </p><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">4-</div>
            <div style="display: inline-block; text-decoration: underline;">REVISION DU CONTRAT</div>
        </h3>
        <p>Toute demande de nouvelle prestation ou toute modification du contenu des prestations devra faire
            l'objet d'avenants négociés entre les parties contractantes. Les plannings de ces avenants seront
            élaborés de manière collaborative entre les parties. Les éventuelles modifications de planning ne
            devront pas avoir d'incidence significative sur le calendrier du présent contrat ni sur l'organisation de
            <br>
            l'équipe du PRESTATAIRE.
        </p><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">5-</div>
            <div style="display: inline-block; text-decoration: underline;">DUREE ET FIN DE CONTRAT</div>
        </h3>
        <span>5.1- Durée et fin de contrat </span>
        <p>Le contrat entre en vigueur à compter de la date de signature par les deux parties et prend fin à la
            remise de l'attestation de fin de prestation, comme défini à l'étape, certifiant l'achèvement de
            l'ensemble des prestations.
        </p>
        <p>Si le BÉNÉFICIAIRE est d'avis que toutes les prestations n'ont pas été réalisées de manière
            satisfaisante, il lui incombe de notifier par écrit au PRESTATAIRE les prestations qu'il estime non
            exécutées. À défaut de cette notification, trente jours après l'achèvement de la mission, le
            PRESTATAIRE est considéré comme ayant pleinement satisfait à toutes ses obligations.
        </p><br>
        <span>5.2- Planning du contrat </span>
        <p>Le démarrage de chaque étape de la mission est considéré comme accepté et dû par le BÉNÉFICIAIRE
            selon les conditions suivantes :
        </p>
    </div>

    <div style="page-break-before: always">

    </div>
    <div style="margin-top:40px;">
        <p>
            Étape 1 : Une fois le délai légal de rétractation écoulé, soit 14 jours après la signature du contrat et du
            devis.
        </p>
        <p>Étape 2 : À la réception par le PRESTATAIRE du premier devis en vue d'une analyse technique, ou à la
            réception d'un courriel confirmant la volonté du BÉNÉFICIAIRE de poursuivre l'accompagnement.
        </p>
        <p>Étape 3 : À la réception de la première facture correspondant à une partie des travaux réalisés.
        </p><br><br>
        <p>La mission, sous la responsabilité du PRESTATAIRE, sera menée conformément au calendrier ci-
            dessous :
        </p>
        <p>Étape 1 : Prise de contact pour la fixation du rendez-vous de la visite technique du logement dans les
            huit jours suivant la réception du contrat signé par les deux parties.
        </p>
        <p>Transmission des livrables dans les 30 jours à compter de la date de la visite sur site.

        </p>
        <p>Étape 2 : Transmission des livrables dans les 30 jours à compter de la réception de l'ensemble des
            devis du projet correspondant au programme de travaux.
        </p>
        <p>Étape 3 : Transmission des livrables dans les 30 jours à compter de la réception de l'ensemble des
            factures correspondant au programme de travaux réalisés, ainsi que de la visite de fin de travaux.
        </p><br><br>
        <p>
            La durée pourra être prolongée en fonction de la fourniture des données à collecter auprès du
            BÉNÉFICIAIRE.
        </p>
        <br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">6-</div>
            <div style="display: inline-block; text-decoration: underline;">RESILIATION</div>
        </h3>
        <p>En cas de non-respect par l'une ou l'autre des parties des engagements mutuels stipulés dans le
            présent contrat, la résiliation automatique du contrat pourra être effectuée par l'une ou l'autre des
            parties après un délai d'un mois suivant l'envoi d'une lettre de mise en demeure en recommandé
            avec accusé de réception.
        </p>
        <p>En cas de résiliation, les parties conviennent de ne solliciter aucun dommage et intérêt.
        </p><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">7-</div>
            <div style="display: inline-block; text-decoration: underline;">PROPOSITION FINANCIERE</div>
        </h3>
        <br>
        <span>7.1- Honoraires </span>
        <p> La rémuneration du PRESTATAIRE d'un commun accord est arrêtée comme suit : </p>
    </div>

    <div style="page-break-before: always"></div>
    <div style="margin-top:-70px;">
        <table>
            <thead>
                <tr>
                    <th style="border-left: none;border-right:none"></th>
                    <th>MONTANT HT</th>
                    <th>TVA 20%<br>(Taux légal en vigueur à la date)</th>
                    <th>MONTANT TTC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="total-row" style="text-align: left;">Étape 1</td>
                    <td>800 € HT</td>
                    <td>160 €</td>
                    <td>960 € TTC</td>
                </tr>
                <tr>
                    <td class="total-row"style="text-align: left;">Étape 2</td>
                    <td>433.33 € HT</td>
                    <td>86.67 €</td>
                    <td>520 € TTC</td>
                </tr>
                <tr>
                    <td class="total-row" style="text-align: left;">Étape 3</td>
                    <td>433.33 € HT</td>
                    <td>86.67 €</td>
                    <td>520 € TTC</td>
                </tr>
                <tr class="total-row">
                    <td style="text-align: left;">TOTAL</td>
                    <td>1666.66 € HT</td>
                    <td>333.34 €</td>
                    <td>2000 € TTC</td>
                </tr>
            </tbody>
        </table>
        <br>
        <p style="color: black ;font-weight: bold;"> LA PRESTATION COMPLETE ACCOMPAGNATEUR RENOV INCLUS BIEN L’AUDIT
            ENERGETIQUE (étape
            1)
        </p>
        <span>7.2- Validité </span>
        <p>L'offre est valable 1mois. </p><br><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">8-</div>
            <div style="display: inline-block; text-decoration: underline;">PAIEMENT DE LA PRESTATION</div>
        </h3>
        <span>8.1- Conditions de paiements </span>

        <p>Les missions seront payables à la livraison des documents par étape sur présentation d'une facture
            payable sous 15 jours.</p>
        <p>Par chèque à l’ordre suivant : ENERGIES AUDITS CONSEILS
        </p>
        <p>L'assistance fournie par le PRESTATAIRE peut bénéficier d'un soutien financier de l'État dans le cadre
            du programme « Mon Accompagnateur Renov' ». La contribution de l'État est conditionnée à la
            réalisation par le BÉNÉFICIAIRE d'un projet de travaux conforme aux critères d'éligibilité du « Pilier
            Performance ». En cas d'abandon du projet de travaux par le BÉNÉFICIAIRE, entraînant l'absence de
            participation financière de l'État, cela n'affecte en aucun cas le paiement des missions déjà réalisées
            ou en cours par le PRESTATAIRE.
        </p>
        <br><br>
        <span>8.2- Règlement </span>
        <br>
        <p>Lors de la conclusion du contrat, le PRESTATAIRE demande au BÉNÉFICIAIRE la remise de trois
            chèques, qui seront encaissables à la livraison des étapes 1 et 2. Les détails des chèques sont les
            suivants : </p>
        <p>Premier chèque, représentant le coût de l'étape 1, sera encaissé lors de la réalisation des livrables
            correspondants. </p>
        <p>Deuxième chèque, correspondant au coût de l'étape 2, sera encaissé lors de la réalisation des livrables
            associés. </p>
        <p>Troisième chèque, correspondant au coût de l'étape 3, sera encaissé lors de la réalisation des livrables
            afférents.</p>


    </div>
    <div style="page-break-before: always"> </div>

    <div style="margin-top:40px;">

        <p>Le PRESTATAIRE informera le BENEFICIAIRE avant l'encaissement des chèques.
        </p><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">9-</div>
            <div style="display: inline-block; text-decoration: underline;">RESPONSABILITES/ASSURANCE</div>
        </h3>
        <br>
        <p>Le BÉNÉFICIAIRE et le PRESTATAIRE sont tenus, conformément aux principes du droit commun, de
            répondre de leurs manquements respectifs dans le cadre de l'exécution du présent contrat. </p>
        <p> Le PRESTATAIRE demeure responsable, selon les règles du droit commun, des éventuels dommages
            causés par lui-même ou son personnel aux biens, aux salariés du BÉNÉFICIAIRE, ainsi qu'à des tiers.
        </p>

        <p>Le PRESTATAIRE affirme détenir une assurance responsabilité civile couvrant les conséquences
            financières qui pourraient lui incomber en raison de dommages corporels et/ou matériels causés à
            des tiers et/ou au personnel du BÉNÉFICIAIRE pendant l'exécution du présent contrat. Il fournira la
            justification sur simple demande.
        </p>
        <p>La responsabilité du PRESTATAIRE ne pourra être engagée en cas de retard ou d'empêchement de
            l'exécution du présent contrat résultant d'un cas de force majeure ou de facteurs imputables au
            BÉNÉFICIAIRE, notamment des informations inexactes ou incomplètes transmises à son personnel.
        </p>
        <p>Dans l'éventualité où des fichiers, données, programmes, ou tout autre support de données seraient
            confiés au PRESTATAIRE par le BÉNÉFICIAIRE, il incombe au PRESTATAIRE de prendre toutes les
            mesures nécessaires pour se prémunir, le cas échéant, contre les risques de perte ou d'accident.</p>
        <br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">10-</div>
            <div style="display: inline-block; text-decoration: underline;">DISPOSITIONS GENERALES</div>
        </h3>
        <br>
        <p>Les Parties reconnaissent que la réussite de l'exécution du contrat dépend principalement d'une
            collaboration mutuelle basée sur la bonne foi. En conséquence, chacune des Parties s'engage à
            coopérer de manière optimale avec l'autre Partie dans toutes les circonstances, et notamment, en cas
            de difficulté dans l'exécution du contrat, à rechercher de bonne foi des solutions conformes aux
            intérêts de toutes les parties impliquées.
        </p>
        <p>Le PRESTATAIRE pourra, après avoir obtenu une autorisation expresse du BÉNÉFICIAIRE, faire
            référence au nom du BÉNÉFICIAIRE à des fins de recommandation auprès de tiers, tels que ses
            propres bénéficiaires, prospects, sous-traitants, ainsi qu'auprès des médias ou du public.
        </p><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">11-</div>
            <div style="display: inline-block; text-decoration: underline;">PROPRIETE INTELLECTUELLE</div>
        </h3>

        <p>À la demande du BÉNÉFICIAIRE, le PRESTATAIRE cèdera l'ensemble des droits patrimoniaux qu'il
            détient sur l'étude, ces droits devenant ainsi la propriété du Maître d'Ouvrage.
        </p>
        <p>Cela inclut, mais ne se limite pas à : </p>

    </div>

    <div style="page-break-before: always">

    </div>
    <div style="margin-top:-20px;">
        <p> Les droits de reproduction, permettant au Maître d'Ouvrage de reproduire l'étude en autant
            d'exemplaires qu'il le souhaite, par tous moyens, sur tous supports, et sur tous sites, connus ou
            inconnus au moment de la signature du présent contrat. </p>
        <p> Les droits de représentation, autorisant le Maître d'Ouvrage à utiliser l'étude par tous procédés
            connus ou inconnus au moment de la signature du présent contrat. </p>
        <p>Le droit exclusif de présentation et de communication à des tiers.
        </p>
        <p>Les droits d'utilisation et d'exploitation.
        </p>
        <p>Cependant, le PRESTATAIRE conserve la possibilité de solliciter l'autorisation du Maître d'Ouvrage
            pour communiquer sur une partie ou sur l'intégralité des travaux exécutés.
        </p>
        <br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">12-</div>
            <div style="display: inline-block; text-decoration: underline;">LOIS APPLICABLE ET LITIGES
            </div>
        </h3>
        <br><br>
        <p>Ce contrat est soumis aux lois et règlements de la République Française.
        </p>
        <p>En cas de litige concernant l'application du présent contrat, les parties s'engagent à rechercher un
            accord amiable en premier lieu. Si le litige persiste, le Tribunal de Commerce de Saintes sera le seul
            compétent pour statuer sur la question.
        </p>
        <br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">13-</div>
            <div style="display: inline-block; text-decoration: underline;">TRAITEMENT DES DONNEES PERSONNELLES
            </div>
        </h3>
        <br><br>
        <p>Le PRESTATAIRE collecte des données directement auprès du BÉNÉFICIAIRE dans le cadre de
            l'exécution des missions définies aux articles précédents de ce contrat.
        </p>
        <p>Ce traitement de données à caractère personnel est fondé sur l'exécution du présent contrat qui lie le
            PRESTATAIRE au BÉNÉFICIAIRE. Les données collectées sont destinées a ENERGIES AUDITS CONSEILS.
            En dehors des situations énoncées ci-dessus, le PRESTATAIRE s'engage à ne pas vendre, louer, céder,
            ni donner accès à des tiers aux données du BÉNÉFICIAIRE sans son consentement préalable. Ces
            données seront conservées pendant une période de 10 ans.
        </p>
        <p>En cas de non-respect des dispositions ci-dessus de la part du PRESTATAIRE, le BÉNÉFICIAIRE a le droit
            d'introduire une réclamation auprès de la CNIL (<a href="https://www.cnil.fr" target="_blank"
                style="color: #0070c0";>www.cnil.fr</a>).
        </p><br>
        <h3 style="color: black; margin-left: 10px;">
            <div style="display: inline-block;">14-</div>
            <div style="display: inline-block; text-decoration: underline;">DROIT DE RETRACTATION
            </div>
        </h3>
        <br>
        <p>Le BÉNÉFICIAIRE a le droit de se rétracter du présent contrat sans avoir à fournir de motif, dans un
            délai de 14 jours. Ce délai de rétractation prend fin 14 jours après la conclusion du contrat. Pour
            exercer ce droit, le BÉNÉFICIAIRE doit informer le PRESTATAIRE de sa décision de se rétracter du contrat au
        </p>
        <div style="page-break-before: always">

        </div>
    </div>
    <div style="margin-top:-50px;">
        <p> moyen d'une déclaration explicite, dépourvue d'ambiguïté, notamment par le biais d'une
            lettre postale ou d'un courrier électronique.
        </p>
        <p>Le respect du délai de rétractation suffit si le BÉNÉFICIAIRE transmet sa communication relative à
            l'exercice du droit de rétractation avant l'expiration du délai prévu.
        </p><br>

        <p>En acceptant ce contrat, le BÉNÉFICIAIRE atteste avoir pris connaissance de l'ensemble des clauses
            qui le composent .</p><br>


        @php
use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
$invoice = $project
    ->invoices()
        ?->where('type', DInvoiceHeaderType::MAR->value)
    ->latest()
    ->first();
$signatureDate =
    \Carbon\Carbon::parse($project?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ??
    \Carbon\Carbon::parse($invoice->visit_date)->format('d/m/Y');
        @endphp
        <p> Fait à <span class="{client_address}">{{ $project->client?->city }}</span> le <span
                class="{date}">{{ $signatureDate }}</span><br>
        </p>
        <p>
            En deux exemplaires originaux

        </p>
        <br><br><br><br>
        <div style="position: relative;">
            <!-- Les titres BENEFICIAIRE et PRESTATAIRE -->
            <div style="position: absolute; top: -20px; left: 15%; font-size: 12px; color: black; font-weight: bold;">
                BENEFICIAIRE
            </div>
            <div style="position: absolute; top: -20px; right: 25%; font-size: 12px; color: black; font-weight: bold;">
                PRESTATAIRE
            </div>


            <div class="div1">
                <div class="content">
                    @if ($project->client->signature)
                        <img src="{{ storage_path('app/' . $project->client->signature) }}"
                            style="height: 80px;weight:auto;">
                    @endif
                </div>
            </div>

            <div class="div2">
                <div class="content">
                    @if ($project->company->signature)
                        <img src="{{ storage_path('app/' . $project->company->signature) }}"
                            style="height: 80px;weight:auto;">
                    @endif
                </div>
            </div>

        </div>

    </div>

</body>

</html>
