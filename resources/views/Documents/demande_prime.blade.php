<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ATTESTATION DE TRAVAUX
        DEMANDE DE PRIME</title>
    <style>
        @page {
            margin-top: 50px;
            margin-bottom: 50px;
            margin-right: 60px;
            margin-left: 60px;
        }

        .title {
            color: #000000;
            font-weight: bold;
            margin-bottom: 40px;
            padding-left: 30px;
            padding-right: 30px;
            font-family: Tahoma, "Trebuchet MS", sans-serif;
        }

        .tahoma {
            font-family: Tahoma, "Trebuchet MS", sans-serif;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        p {
            font-size: 14px;
        }
    </style>

<body>

    <div style=" width: 100%; position:relative; top:-30px;">
        <table style="width: 100%">
            <td><img style="height: 110px;" src="{{ resource_path('images/republic-fr.png') }}" alt="repFrancaise"></td>
            <td style="width: 70%"></td>
            <td><img style="height: 110px" src="{{ resource_path('images/agence-nationale.png') }}"
                    alt="agenceNationale"></td>
        </table>
    </div>
    <div>
        <p style="font-size:10px;margin-bottom:5px;text-align:center;position:relative;top:50px;z-index:99;">
            MaPrimeRénov' - Forfait rénovation globale et / ou bonus de performance énergétique</p>
        <h3 class="title"
            style="background-color:#ededed;text-align:center;padding:15px;padding-top:35px;padding-bottom:35px; ">

            ATTESTATION DE TRAVAUX <br>
            DEMANDE DE PRIME
        </h3>
        <p style="font-size:10px;margin-bottom:5px;text-align:center;position:relative;top:-70px;z-index:99;">
            Applicable à compter du 1er avril 2023
        </p>
    </div>
    <div>
        @php
            $signatureDate =
                \Carbon\Carbon::parse($project?->visits->where('type', 0)->first()?->visit_date)->format('d/m/Y') ??
                now()->format('d/m/Y');
        @endphp
        <p class="tahoma" style="font-weight:bold;">
            Date {{ $signatureDate }}
        </p>
        <p class="tahoma" style="font-weight: bold;margin-top:-10px;">
            NOM Prénom du demandeur de la prime : <br>
            <span style="font-weight:500"> {{ $project->client->last_name . ' ' . $project->client->first_name }}</span>
        </p>
        <p class="tahoma" style="font-weight: bold;margin-top:-10px;">
            Type de prime demandée :
        </p>
        <p style="margin-left:30px;margin-top:-10px;font-size:13px;">
            <input type="checkbox" id="{prime_type1}" style="vertical-align: bottom;" checked> Forfait rénovation
            globale<sup>1</sup> <br>
            <input type="checkbox" id="{prime_type2}" style="vertical-align: bottom;"
                @if ($project->EnergyperformanceBeforeWork?->type == '5') checked @endif @if ($project->EnergyperformanceBeforeWork?->type == '6') checked @endif> Bonus
            sortie de passoire énergétique<sup>2</sup> <br>
            <input type="checkbox" id="{prime_type3}" style="vertical-align: bottom;"> Bonus BBC (Bâtiment basse
            consommation)<sup>3</sup> <br>
        </p>
        <p
            style="font-size:15px;background-color:#ededed;padding:8px;padding-left:15px;font-weight:bold;margin-top:50px;">
            Logement
        </p>
        <p class="tahoma" style="font-weight: bold;margin-top:20px;">
            Adresse de réalisation des travaux :
        </p>
        <p class="tahoma" style="font-weight:normal;margin-top:-10px;">
            N° Voie: {{ $project->house_number ?? '--' }} {{ $project->street ?? '--' }} <br>
            Code Postal {{ $project->zip_code ?? '--' }} <br>
            Ville: {{ $project->city ?? '--' }}
        </p>
        <p style="font-size:15px;background-color:#ededed;padding:8px;padding-left:15px;font-weight:bold;margin-top:40px;"
            class="tahoma">
            Coût des travaux
        </p>
        @php
            $total = $project->invoices->where('type', 1)->first()?->TTC_total;
        @endphp
        <p class="tahoma" style="font-weight: bold;margin-top:20px;">
            Coût total des travaux (intégrant une prestation éventuelle d’Assistance à Maîtrise d’Ouvrage) <br>
            = {{ round($total, 2) }} € TTC
        </p>
    </div>

    <div style="page-break-before:always;border:8px solid #ededed;margin-top:20px;">
        <p style="font-size:16px;text-align:center;background-color:#ededed;padding:15px;margin-top:-5px;font-weight:bold;"
            class="tahoma">
            Synthèse à remplir par le professionnel ayant réalisé l’audit énergétique
        </p>
        <p style=" padding:10px;font-weight:bold;">
            Date de facturation de l’audit<sup>4</sup> : {{ date('d/m/Y', strtotime($project->date_audit)) }}
        </p>
        <p style=" padding:10px;margin-top:-25px;">
            En signant le présent document, le professionnel ayant réalisé l’audit énergétique certifie sur l’hon-
            neur que l’audit énergétique a été réalisé conformément aux dispositions prévues par l’arrêté du
            17 novembre 2020 relatif aux caractéristiques techniques et modalités de réalisation des travaux et
            prestations dont les dépenses sont éligibles à la prime de transition énergétique. Il renseigne ci-des-
            sous uniquement les critères du projet de travaux retenu par le demandeur
        </p>
        <p style=" padding:10px;font-weight:bold;margin-top:-25px;">
            Surface habitable<sup>5</sup> : {{ $project->surface_housing_before_work }} m<sup>2</sup>
        </p>
        <p style="font-size:16px;background-color:#ededed;padding:5px;margin:16px;font-weight:bold;padding-left:10px;margin-top:10px;"
            class="tahoma">
            Caractéristiques des travaux
        </p>
        <p style=" padding:15px;font-size:10px;margin-top:-10px;margin-bottom:-25px;">
            Attention : depuis le 1er avril 2023, dans le cas d’une demande de forfait rénovation globale, le projet de
            travaux ne doit pas inclure l’installation
            d’une chaudière fonctionnant principalement aux énergies fossiles. Dans le cas contraire, la demande de
            prime sera rejetée.
        </p>
        <table style="width:97.5%;padding:10px;margin:10px;border-collapse: collapse;">
            <tr>
                <td style="width: 50%;vertical-align:top;font-weight:bold;">
                    <p>
                        Nature des travaux
                    </p>
                </td>
                <td style="width: 50%;">
                    <p style="font-weight: bold;margin-bottom:-10px;">
                        Coût associé à chaque travaux <br>
                        <span style="font-weight: normal;font-size:10px;margin-bottom:-10px;">Le coût des travaux peut
                            être renseigné par le <br>
                            demandeur à partir des devis des entreprises qui <br>
                            réaliseront les travaux</span>
                    </p>
                </td>
            </tr>
            {{-- foreach --}}
            @foreach ($project->invoices->where('type', 1) as $index => $invoice)
                @foreach ($invoice?->lines as $key => $line)
                    <tr>
                        <td>
                            <p style="padding-right:30px;margin-bottom:-10px;">
                                {{ $key + 1 }}. {{ $line->designation }}
                            </p>
                        </td>
                        <td>
                            <p style="margin-bottom:-10px;vertical-align:top;">
                                {{ $key + 1 }}. {{ round($line->amount_TTC, 2) }} € TTC
                            </p>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            {{-- end foreach --}}
        </table>
    </div>
    <div style="page-break-before:always;border:8px solid #ededed;margin-top:20px;">
        <table style="width:97.5%;padding:10px;border:1px solid;margin:10px;border-collapse: collapse;">
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Consommation conventionnelle du bâtiment avant les travaux en énergie primaire
                        (le chauffage, le refroidissement et la production d’eau chaude sanitaire) :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        C initial = {{ round($project->primary_energy_before_work, 2) }} kWh/m²/an
                        d’énergie primaire
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Consommation conventionnelle du logement rénové en énergie primaire :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        C projet = {{ round($project->primary_energy_after_work, 2) }} kWh/m²/an
                        d’énergie primaire
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Gain énergétique exprimé en % :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        G = {{ round($project->gain_energy, 2) }} en %
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td colspan="2" style="padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Coût total de l’audit énergétique revenant au logement :
                        {{ round($project->total_cost_energy_audit, 2) }} € TTC
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Émissions annuelles de gaz à effet de serre
                        avant les travaux :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        GES initial = {{ round($project->gaz_emission_before_work, 2) }} kgeqCO2/m²/an
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Émissions annuelles de gaz à effet de serre
                        après les travaux :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        GES initial = {{ round($project->gaz_emission_after_work, 2) }} kgeqCO2/m²/an
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Étiquette DPE avant les travaux :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        {{ $project->dpe_before }}
                    </p>
                </td>
            </tr>
            <tr style="border-bottom:1px solid;">
                <td style="width: 50%;border-right:1px solid;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        Étiquette DPE après les travaux :
                    </p>
                </td>
                <td style="width: 50%;padding:10px;padding-top:1px;padding-bottom:1px;">
                    <p>
                        {{ $project->dpe_after }}
                    </p>
                </td>
            </tr>
        </table>
        <p style="font-size:16px;background-color:#ededed;padding:5px;font-weight:bold;padding-left:10px;"
            class="tahoma">
            Identité du professionnel ayant réalisé l’audit énergétique
        </p>
        <p>
            Nom du professionnel ayant réalisé l’audit énergétique : <br>
            {{ $project->auditor?->company->trade_name }}<br>
            N° SIRET : {{ $project->auditor?->company->siret_without_space }} <br>
            Fait à : {{ $project->auditor?->company->city }} le : {{ now()->format('d/m/Y') }}
        </p>

        <table style="width:100%">
            <tr>
                <td style="width:20%">
                </td>
                <td style="width:30%">
                    Signature
                </td>
                <td>
                    @if ($project->auditor?->company->signature)
                        <img src="{{ storage_path('app/' . $project->auditor?->company->signature) }}" alt="signature"
                            style="width: 200px;height:100px;">
                    @endif

                </td>
            </tr>
        </table>

    </div>
    <div style="border:8px solid #ededed;margin-top:20px;page-break-before:always">
        <p style="font-size:16px;text-align:center;background-color:#ededed;padding:15px;margin-top:-5px;font-weight:bold;"
            class="tahoma">
            Recours éventuel à une assistance à maîtrise d’ouvrage (AMO)<sup>6</sup> <br>
            <span style="font-weight:normal;font-size:14px;">À remplir par l’entreprise AMO</span>
        </p>
        <p style="margin:15px;font-weight:bold;" class="tahoma">
            Coût total éligible revenant au logement = {{ round($project->cost_ttc_offre, 2) }} € TTC
        </p>
        <p style="margin:15px;margin-top:-10px;">
            Nature de la mission d’assistance à maîtrise d’ouvrage : <br>
            {{ $project->scenario }}
        </p>
        <p style="padding-bottom:60px;margin:15px;">
            Nom de l’entreprise : {{ $project->company->trade_name }} <br>
            N° SIRET : {{ $project->company->siret_without_space }} <br>
            Fait à : {{ $project->company->city }} le: {{ now()->format('d/m/Y') }} <br>
        </p>

        <table style="width:100%">
            <tr>
                <td style="width:20%">
                </td>
                <td style="width:30%">
                    Signature
                </td>
                <td>
                    @if ($project->company->signature)
                        <img src="{{ storage_path('app/' . $project->company->signature) }}" alt="signature"
                            style="width: 200px;height:100px;">
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <div>
        <p style="margin-top:80px;font-weight:bold;margin-left:30px;">
            Signature et nom(s) du demandeur : {{ $project->client->last_name . ' ' . $project->client->first_name }}
            <br>
            @if ($project->client->signature)
                <img src="{{ storage_path('app/' . $project->client->signature) }}" alt="signature"
                    style="width: 200px;height:auto;">
            @endif
        </p>
    </div>
    <div style="position:absolute;top:79%">
        <hr style="width: 40%; margin: 0; margin-left: 20;">
        <p style="font-size: 10px;margin-left:20px;">
            <sup>1</sup>« Forfait rénovation globale » renvoie à l'ensemble de travaux de rénovation énergétique visant
            à améliorer la performance globale du logement, mentionné au 15
            de l'annexe 1 du décret n°2020-26 du 14 janvier 2020 modifié et à l'article 13-2 du présent arrêté.
            Conformément à ce même article, le projet de travaux ne doit pas
            porter sur l’installation d’une chaudière fonctionnant principalement aux énergies fossiles.
        </p>
        <p style="font-size: 10px;margin-left:20px;">
            <sup>2</sup>« Bonus sortie de passoire énergétique » renvoie à la somme forfaitaire mentionnée au septième
            alinéa du I de l'article 3 du décret n°2020-26 du 14 janvier 2020
            modifié et à l'article 13-3 du présent arrêté.
        </p>
        <p style="font-size: 10px;margin-left:20px;">
            <sup>3</sup>« Bonus Bâtiment basse Consommation » renvoie à la somme forfaitaire mentionnée au septième
            alinéa du I de l'article 3 du décret n°2020-26 du 14 janvier 2020
            modifié et à l'article 13-4 du présent arrêté.
        </p>
        <p style="font-size: 10px;margin-left:20px;">
            <sup>4</sup>À la date du dépôt de la demande de prime, la facturation de l’audit ne doit pas dater de plus
            d’un an. En l’absence de facturation de l’audit énergétique, celui-ci
            doit être valide à la date du dépôt de la demande de prime.
        </p>
        <p style="font-size: 10px;margin-left:20px;">
            <sup>5</sup>En cas de projet de travaux entraînant une modification de la surface habitable, mentionner
            également la surface habitable après travaux
        </p>
        <p style="font-size: 10px;margin-left:20px;">
            <sup>6</sup>« Assistance à maîtrise d'ouvrage (AMO) » renvoie au 14 de l'annexe 1 du décret °2020-26 du 14
            janvier 2020 modifié et à l'article 13-1 du présent arrêté. L’entreprise
            chargée de la mission d’assistance à maîtrise d’ouvrage ne peut être le maître d’œuvre, ni participer à la
            Maîtrise d'ouvrage (sauf architectes), ni être une entreprise
            fournisseur de matériaux, d’énergie ou d’équipements.
        </p>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
                $pdf->page_script('
                if ($PAGE_COUNT > 1) {
                    $x1 = $pdf->get_width() - 50;
                    $y1= $pdf->get_height() - 50;
                    $font = $fontMetrics->get_font("helvetica", "bold");
                    $size = 7;
                    $pageText1="$PAGE_NUM/$PAGE_COUNT";
                    $pdf->text($x1, $y1,$pageText1 , $font, $size);
                }
            ');
        }
        </script>
</body>

</html>
