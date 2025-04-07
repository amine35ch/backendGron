<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devis attaché à un contrat</title>
    <style>
        @page {
            margin-top: 40px;
            margin-bottom: 10px;
            margin-right: 80px;
            margin-left: 55px;
        }

        body {
            font-family: "Calibri", sans-serif;
        }

        .devis td {
            font-size: 13px;
            text-align: left;
            border-left: 1px solid;
            padding: 7px;
        }

        .cube-list {
            list-style: square;
        }

        .cube-list li {
            font-size: 13px;
        }

        .line {
            list-style: none;
        }

        .line li:before {
            content: '-';
            font-family: DejaVu Sans, 'Cambria', sans-serif !important;

        }

        .constantia {
            font-family: "Alegreya", serif;
        }

        .footer {
            position: absolute;
            top: 93%;
            left: 50%;
            width: 100%;
            transform: translateX(-50%);
        }

        .footer p {
            text-align: center;
            font-size: 12px;
            color: #808080;
        }

        p {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div style="text-align: right;">
        @if ($project->company->logo)
            <img src="{{ storage_path('app/' . $project->company->logo) }}"
                style="text-align:right;width: 100px; height: auto;" alt="">
        @else
            <img src="{{ resource_path('images/logo-mar.png') }}" style="text-align:right;width: 100px; height: auto;"
                alt="">
        @endif
    </div>
    <div>
        <h4 style="margin-bottom:-15px;font-size:14px;"><span class="{company_name}">
                {{ $project->company->trade_name }}</span></h4>
        <p style="font-size:14px;"><span class="{company_address}">{{ $project->company->address }}</span><br><span
                class="{company_postal_city}">{{ $project->company->zip_code . ', ' . $project->company->city }}</span>
        </p>
    </div>
    <div style="position: relative; left: 40%">
        <table style="border-collapse: collapse; width: 50%;border:solid 2px;">
            <tr>
                @php
                    use App\Enums\DInvoiceEnum\DInvoiceHeaderType;
                    use App\Enums\DClientEnum\DClientGender;
                    $invoice = $project
                        ->invoices()
                        ?->where('type', DInvoiceHeaderType::MAR->value)
                        ->latest()
                        ->first();
                @endphp
                <td
                    style=" padding-left: 20px; padding-right: 15px; font-weight: bold; font-size: 13px;padding-top:5px;">
                    @if ($project->client->gender == DClientGender::Male->value)
                        Monsieur
                    @elseif ($project->client->gender == DClientGender::Female->value)
                        Madame
                    @else
                        Monsieur Ou Madame
                    @endif <span
                        class="{client_name}">{{ $project->client->last_name . ' ' . $project->client->first_name }}</span>
                </td>
            </tr>
            <tr>
                <td style=" padding-left: 20px; padding-right: 15px; font-size: 13px;"><span
                        class="{client_address}">{{ $project->client->address }}</span></td>
            </tr>
            <tr>
                <td style=" padding-left: 20px; padding-right: 15px; font-size: 13px;"><span
                        class="{client_postal_city}">{{ $project->client->zip_code . ', ' . $project->client->city }}</span>
                </td>
            </tr>
            <tr>
                <td
                    style=" padding-left: 20px; padding-right: 15px; font-size: 13px; font-weight: bold; border-bottom: 2px solid;padding-bottom:5px;">
                    <span class="{client_number}">{{ $project->client->phone_number_1 }}</span>
                </td>
            </tr>
            <tr>
                <td
                    style=" padding-left: 20px; padding-right: 15px; font-size: 13px; font-weight: bold;padding-top:5px;">
                    Devis N° <span class="{invoice_reference}">{{ $invoice->reference }}</span></td>
            </tr>
            @php
                $signatureDate=\Carbon\Carbon::parse($project?->visits->where('type',0)->first()?->visit_date)->format('d/m/Y') ?? $invoice->invoice_date;
            @endphp
            <tr>
                <td style=" padding-left: 20px; padding-right: 15px; font-size: 13px;padding-bottom:5px;">Date : <span
                        class="{invoice_date}">{{ $signatureDate }}</span>
                </td>
            </tr>
        </table>
    </div>
    @php
        $invoice = $project->invoices()?->where('type', 0)->latest()->first();
        $audit_invoice = $invoice->lines?->where('d_article_id', 1)?->first();
        $mar_invoice = $invoice->lines
            ?->where('type', DInvoiceHeaderType::MAR->value)
            ->where('d_article_id', 2)
            ?->first();
    @endphp
    <div style="margin-top:20px;">
        <table style="border:1px solid;width:100%;border-collapse: collapse;" class="devis">
            <tr style="border-bottom: 1px solid;text-align:center;">
                <td
                    style="width: 42%;background-color:#f2f2f2;border-right:1px solid;font-weight:bold;height:40px;text-align:center;">
                    Libellé</td>
                <td
                    style="width:10%;background-color:#f2f2f2;border-right:1px solid;font-weight:bold;text-align:center;">
                    Quantité</td>
                <td
                    style="width:15%;background-color:#f2f2f2;border-right:1px solid;font-weight:bold;text-align:center;">
                    Montant <br> HT</td>
                <td
                    style="width:13%;background-color:#f2f2f2;border-right:1px solid;font-weight:bold;text-align:center;">
                    TVA</td>
                <td style="width:20%;background-color:#f2f2f2;font-weight:bold;text-align:center;">Montant TTC</td>
            </tr>
            @foreach ($invoice->lines as $line)
                <tr>
                    <td style="font-weight:bold;border-bottom:1px solid;">{{ $line->designation }}</td>
                    <td style="border-bottom:1px solid;text-align:center;"><span>{{ $line->qty }}</span></td>
                    <td style="border-bottom:1px solid;text-align:center;"><span>{{ round($line->amount_HT, 2) }}
                            {{ $project->company->currency }} </span></td>
                    <td style="border-bottom:1px solid;text-align:center;"><span>{{ round($line->amount_TVA, 2) }}
                            {{ $project->company->currency }}</span></td>
                    <td style="border-bottom:1px solid;font-weight:bold;text-align:center;">
                        <span>{{ round($line->amount_TTC, 2) }} {{ $project->company->currency }}</span>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td style="font-weight:bold;border-bottom:1px solid;"><span
                        style="width:30%;padding:9px;position: relative;left:39%;border-left:solid 1px;">Sous-total</span>
                </td>
                <td style="border-bottom:1px solid;"></td>
                <td style="border-bottom:1px solid;text-align:center;"><span
                        class="{ht_total}">{{ round($invoice->HT_total, 2) }} {{ $project->company->currency }}</span>
                </td>
                <td style="border-bottom:1px solid;text-align:center;"><span
                        class="{tva_total}">{{ round($invoice->TVA_total, 2) }}
                        {{ $project->company->currency }}</span></td>
                <td style="border-bottom:1px solid;background-color:#f2f2f2;font-weight:bold;text-align:center;"><span
                        class="{ttc_total}">{{ round($invoice->TTC_total, 2) }}
                        {{ $project->company->currency }}</span></td>
            </tr>
            <tr>
                <td style="font-weight:bold;text-align:center;" colspan="4">Aides de l'ANAH</td>
                <td style="font-weight:bold;"></td>
            </tr>
            <tr>
                <td style="font-size:11.5px;text-align:left;" colspan="4">
                    <span style="font-weight: bold;"> Financement par l'ANAH </span> de l'Accompagnateur
                    Rénov' <span style="font-weight: bold;">selon les plafonds de ressources</span>
                </td>

                <td style="font-weight:bold;"></td>
            </tr>
            <tr>
                <td style="font-size:11px;text-align:right;" colspan="4">
                    <span style="border:1px solid;padding:5px 5px 5px 15px;;margin-right:-8px;"
                        class="{class}">{{ $project->projectIncomeClass?->entitled }}</span>
                </td>
                {{-- <td style="text-align:center;">
                    <span style="" class="{class_qty}"> {{ 1 }} </span>
                </td>
                <td style="text-align:center;">
                    <span style="" class="{class_ht}"> {{ round($invoice->HT_anah, 2) }}
                        {{ $project->company->currency }}</span>
                </td>
                <td style="text-align:center;">
                    <span style="" class="{class_tva}"> {{ round($invoice->TVA_anah, 2) }}
                        {{ $project->company->currency }}</span>
                </td> --}}
                <td style="text-align:center;"><span style="font-weight:bold;" class="{class_ttc}">
                        {{ round($invoice->TTC_anah, 2) }} {{ $project->company->currency }}</span>
                </td>
            </tr>
            <tr>
                <td style="text-align: right;font-weight:bold;border-bottom:1px solid;" colspan="4">Total Reste à
                    Payer</td>
                {{-- <td style="border-bottom:1px solid;text-align:center;"></td>
                <td style="border-bottom:1px solid;text-align:center;"><span
                        class="{rtp_ht}">{{ round($invoice->HT_rest, 2) }} {{ $project->company->currency }}</span>
                </td>
                <td style="border-bottom:1px solid;text-align:center;"><span
                        class="{rtp_tva}">{{ round($invoice->TVA_rest, 2) }} {{ $project->company->currency }}</span>
                </td> --}}
                <td style="border-bottom:1px solid;background-color:#f2f2f2font-weight:bold;text-align:center;"><span
                        class="{rtp_ttc}">{{ round($invoice->TTC_rest, 2) }} {{ $project->company->currency }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: left;"> Réglement par chèque à l'ordre de
                    {{ $project->company->trade_name }}</td>
            </tr>
        </table>
    </div>
    <div style="margin-top:35px;">
        <p style=" font-size:14px;"><b>Validité du devis :</b> 3 mois à compter de la date d’émission <br><b>Date de
                début de la prestation :</b> À compter de la date de signature du contrat <br><b>Date de fin de la
                prestation :</b> Deux mois à compter de la date de fin des travaux. <br><b>Conditions de règlement :</b>
        </p>
        <ul class="line" style="margin-top:-7px;">
            <li style=" font-size:14px;">Le paiement du solde du devis est à la réception du chantier</li>
        </ul>
    </div>
    <div style="margin-left:140px;">
        <p><b class="constantia" style="font-size:17px;">Le Bénéficiaire</b> <br> Signature précédée de la mention
            manuscrite <br><i>« Bon pour accord et exécution du devis »</i></p>
    </div>
    <div class="footer">
        <p> SAS au capital social de <span
                class="{capital_company}">{{ number_format(round($project->company->capital, 2), 2, ',', ' ') }}</span>
            € - RCS <span class="{capital_company}">{{ $project->company->company_rcs }}</span> <br> Code NAF
            Ingénierie, Études Techniques (7112B) - N° TVA intracommunautaire <span
                class="{tva_company}">{{ $project->company->identifiant_tva }}</span> <br> N° d’Agréement Mon
            Accompagnateur Rénov’ : <span class="{approval_company}">{{ $project->company->approval_number }}</span> -
            Page 1 /1</p>
    </div>
</body>

</html>
