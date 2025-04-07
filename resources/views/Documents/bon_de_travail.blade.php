<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @font-face {
        font-family: DejaVu Sans, 'Cambria', sans-serif !important;
        src: url('/fonts/Cambria.ttf') format('truetype');
    }

    @page {
        margin-top: 10px;
        margin-bottom: 0px;
        margin-left: 20px;
        margin-right: 20px;
    }
</style>

<body>
@php
$invoice = \App\Models\DProjectInvoiceHeader::where('d_project_id', $projectDocument->d_project_id)->first();
$installer = \App\Models\DCompany::where('id',$invoice['d_company_id'])->first();
@endphp
    @foreach ($data as $bloc)
        @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @elseif ($field['type'] == 'travail')
                    <div>

                        <table style="width:100%; border-collapse: collapse; border: 2.7px solid; margin-top:10px;">

                            <tr>
                                <td
                                    style="width: 23%;background-color: #bdd7ee;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;">
                                    <b> ENTREPRISE
                                        D' INSTALLATION</b>
                                </td>
                                <td style="width: 77%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;"
                                    colspan="2">{{ $installer->trade_name }}</td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 23%;background-color: #bdd7ee;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;">
                                    <b> ADRESSE DE L'ENTREPRISE<br>
                                        D'INSTALLATION</b>
                                </td>
                                <td style="width: 77%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;"
                                    colspan="2">
                                    {{ $project->installer?->company->address . ', ' . $project->installer?->company->city . ', ' . $project->installer?->company->zip_code }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 23%;background-color: #bdd7ee;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;">
                                    <b> SIRET DE L'ENTREPRISE <br>D' INSTALLATION</b>
                                </td>
                                <td style="width: 77%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;"
                                    colspan="2">{{ $project->installer?->company->siret }}</td>
                            </tr>
                            <tr>
                                <td style="width: 23%;background-color: #bdd7ee;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;"
                                    rowspan="{{ count($invoice['lines']) + 1 }}">
                                    <b> {{count($invoice['lines']) }}TRAVAUX
                                        A RÉALISER</b>
                                </td>
                                <td
                                    style="width: 38.5%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;border-right: 2px solid;">
                                    Description</td>
                                <td
                                    style="width: 38.5%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;">
                                    Valeur (m² / Quantité d'équipement)</td>
                            </tr>
                            @foreach ($invoice['lines'] as $work)
                                <tr>
                                    <td
                                        style="width: 38.5%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;border-right: 2px solid;">
                                        {{ $work?->work?->reference }} </td>


                                    <td
                                        style="width: 38.5%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;">
                                        {{ $work->qty }} </td>
                                </tr>
                            @endforeach
                            @php
                                $invoiceInstaller = $project->invoices()->where('type', 1)->first();
                            @endphp
                            <tr>
                                <td
                                    style="width: 23%;background-color: #f8cbad;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;">
                                    <b> COÛT DES TRAVAUX (€)</b>
                                </td>
                                <td style="width: 77%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;"
                                    colspan="2">{{ number_format($invoice->TTC_total, 2) }}</td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 23%;background-color: #e2efda;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;">
                                    <b> MONTANT DES AIDES (€)</b>
                                </td>
                                <td style="width: 77%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;"
                                    colspan="2">
                                    {{ number_format(round($invoice->prime_renov_bonification, 2), 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="width: 23%;background-color: #ffe699;height:35px;text-align:center;font-size:10px;border-bottom:solid 2px;border-right:2px solid;">
                                    <b> RESTE A CHARGE (€) </b>
                                </td>
                                <td style="width: 77%;background-color: #f2f2f2;text-align:center;font-size:14px;border-bottom:2px solid;"
                                    colspan="2">
                                    {{ number_format($invoice->TTC_total - $invoice->prime_renov_bonification, 2) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif
            </div>
        @endforeach
    @endforeach


</body>

</html>
