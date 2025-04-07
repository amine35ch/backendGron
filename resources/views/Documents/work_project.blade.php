<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Project</title>
    <style>
        @font-face {
            font-family: DejaVu Sans, 'Cambria', sans-serif !important;
            src: url('/fonts/Cambria.ttf') format('truetype');
        }

        body {
            font-family: DejaVu Sans, 'Cambria', sans-serif !important;
            src: url('/fonts/Cambria.ttf') format('truetype');
            font-size: 13px
        }

        footer {
            position: fixed;
            bottom: -43px;
            left: -31;
            right: -50px;
            height: 50px;
            text-align: center;
            font-size: 9px;
            color: rgb(68, 67, 67);

        }

        .td-style {
            text-align: center;
            vertical-align: middle;
        }

        .td-style-left {
            text-align: left;
            vertical-align: middle;
        }

        table {
            page-break-inside: auto
        }

        * {
            widows: 1;
            orphans: 1;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 48%;
            transform: translate(10%, 25%);
            z-index: 1;
        }

        .text span {
            font-size: 9px;
            font-weight: bold;
            color: white;
            text-align: center;
        }

        .vertical-text-left {
            transform: rotate(-180deg);
            position: absolute;
            right: -35;
            top: 35%;
        }

        .card {
            position: absolute;
            left: 84%;
            top: -40;
        }

        .name_card {
            position: absolute;
            right: 60%;
            top: -40;
            font-size: 12px;
            color: #032d87;
        }

        .with-border {
            border: 1px solid black;

        }

        p {
            font-size: 11px
        }

        span {
            font-size: 12px;
        }

        body {
            font-family: "Calibri", sans-serif;

        }

        @page {
            margin-top: 10;
            margin-bottom: 20;
            margin-left: 30;
            margin-right: 10;
        }
    </style>
</head>

<body>
    <div style="margin-top:0px">
        <table style="width: 100%;text-align:center">
            <tr>

                <td>
                    <h2 style="color:#4472c4">
                        Préparation du projet des travaux
                    </h2>
                </td>

            </tr>
        </table>
    </div>



    @foreach ($data as $bloc)
        @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @elseif ($field['type'] == 'table')
                    <div>
                        <table style="width:100%; border-collapse:collapse; border:1px black;">
                            <tr class="with-border">
                                <td style="padding-left:10px" class="with-border"><span padding-left:10px>Nom
                                        Entreprise </span></td>
                                <td style="padding-left:10px" class="with-border"><span padding-left:10px>Numéro RGE
                                    </span></td>
                                <td style="padding-left:10px" class="with-border"><span padding-left:10px>Adresse
                                    </span>
                            </tr>
                            @php
                                $invoiceList = $project->invoices
                                    ->where('type', \App\Enums\DInvoiceEnum\DInvoiceHeaderType::INSTALLER->value)
                                    ->where(
                                        'status',
                                        \App\Enums\DProjectInvoiceHeaderEnum\DProjectInvoiceHeaderStatusEnum::VALIDATED
                                            ->value,
                                    )
                                    ->all();
                            @endphp

                            @foreach ($invoiceList as $key => $invoice)
                                @php
                                    $installer = \App\Models\DCompany::where('id', $invoice['d_company_id'])->first();
                                @endphp
                                <tr class="with-border">
                                    <td style="padding-left:10px"><span padding-left:10px><span
                                                class="{installer_name}">{{ $installer?->trade_name }}</span></span>
                                    </td>
                                    <td style="padding-left:10px" class="with-border"><span padding-left:10px><span
                                                class="{installer_rge}">
                                                @if ($installer?->rges)
                                                    @foreach ($installer?->rges as $rge)
                                                        {{ $rge->rge }} <br>
                                                    @endforeach
                                                @endif
                                            </span></td>
                                    <td style="padding-left:10px" class="with-border"><span padding-left:10px><span
                                                class="{installer_address}">{{ $installer?->address . ' ' . $installer?->zip_code . ' ' . $installer?->city }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endif
            </div>
        @endforeach
    @endforeach
</body>

</html>
