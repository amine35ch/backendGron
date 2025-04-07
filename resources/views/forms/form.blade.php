<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport</title>
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
        .question {
            color: #000000;
            font-size: 12px;
            font-weight: 400;
            /* font-weight: bold; */
            padding-top: 10px;
        }

        .sub-question {
            color: #000000;
            font-size: 12px;
            font-weight: 400;
            /* font-weight: bold; */
            padding-left: 70px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .response {
            color: #000000;
            font-size: 12px;
            font-weight: bold;
            padding-bottom: 5px;
            padding-left:10px;
        }

        .title {
            color: #000000;
            background-color: rgb(235, 235, 243);
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
            padding-left: 20px;
            padding-right: 20px;
            text-align: left;
        }
        .title h3{
            position: relative;
            right: -50px;
            padding: 30px;
        }
        .sub-title {
            color: #000000;
            font-weight: bold;
            text-align: left;
            padding-left: 35px;
            padding-right: 20px;
            text-align: left;
        }

        /* .sub-sub-title {
            color: #000000;
            font-weight: bold;
            text-align: left;
            padding-left: 45px;
            padding-right: 20px;
            text-align: left;
        } */

        .row-height {
            height: 30px;
        }

        .text-bold {
            color: #ea6544;
            padding-left: 20px;
            font-size: 12px;
            font-weight: bold
        }

        .text-inside-page-one {
            padding-left: 10px;
            color: #ea6544;
            font-size: 10px;
            font-weight: bold;

            margin: 2px
        }

        .padding-text {
            padding-left: 20px;
        }

        .th-style {
            background-color: #f27454;
            border: 1px solid #f27454;
            border-collapse: collapse;
            color: white;
            font-size: 12px;
            font-weight: bold;
            height: 44px;
        }

        .table-first-page {
            border: 0px;
            width: 100%;
            background-color: rgb(245, 245, 245);
            margin-top: 4px;
            min-height: 190px;
            max-height: 190px;
            border-collapse: collapse
        }

        .bottom-page-table {
            border: 0px;
            width: 100%;
            background-color: rgb(235, 235, 243);
            min-height: 240px;
            max-height: 240px;
            border-collapse: collapse;
            margin-top: 4px
        }

        .first-tables {
            width: 98%;
            margin-left: 6px;
            background-color: rgb(253, 250, 250);
            border: 0px solid rgb(235, 235, 243);
            border-bottom: none;
            border-collapse: collapse;
            border-spacing: 0;
        }

    .conclusion-table {
      width: 100%;
      border-collapse: collapse;
      margin: auto;
    }

    .conclusion-table th, .conclusion-table td {
      border: 1px solid black;
      padding: 8px;
    }
    </style>
</head>

<body>

    <div style=" width: 100%;">
        <table style="width: 100%">
            <td ><img style="height: 120px;" src="{{getcwd().'/logos/repFrancaise.png' }}" alt="repFrancaise"></td>
            <td style="width: 70%"></td>
            <td><img style="height: 120px" src="{{getcwd().'/logos/agenceNationale.png' }}" alt="agenceNationale"></td>
        </table>
    </div>
    @foreach ($pdfDeatils['form']['blocs'] ?? [] as $bloc)
    {{-- @if ( !count($bloc['lines'][0]['content']) )
    @continue

    @endif --}}
    @php
        $data = $bloc['lines'][0]['content']['data'] ?? [];
    @endphp
    @if (
        $data &&
        !$data['fields'][0]['value'] ?? [] &&
        $bloc['lines'][0]['display_type'] == 1)
            {{-- {{ $bloc['lines'][0]['type'] }} --}}
            @continue
        @endif
        @php
            try {
                if ($bloc['lines'][0]['type'] == 8) {
                    echo '<div style="page-break-before:always;"></div>';
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        @endphp

        <table class="check-for-page-break" width="100%" style="border-collapse: collapse; margin-bottom:20px; ">
            <thead>
                <tr>
                    <th width="100%" class="title" style="background-color:#E8E7E7 !important;">
                        <h3>
                            {{ mb_strtoupper($bloc['title']) }}
                        </h3>
                    </th>
                </tr>
            </thead>
        </table>

        @php
            $companyginTop = $bloc['lines']['0']['type'] == 5 ? '0px' : '0px';
        @endphp
        <div style="width: 100%;">
            @php
                $key = 0;
            @endphp
            @foreach ($bloc['lines'] as $line)
                @if ($line['type'] == 1)
                    @include('forms.form_types.type_1')
                    @php
                        $key++;
                    @endphp
                @endif
                @if ($line['type'] == 3)
                    @include('forms.form_types.type_3')
                    @php
                        $key++;
                    @endphp
                @endif
                @if ($line['type'] == 4)
                    @include('forms.form_types.type_4')
                    @php
                        $key++;
                    @endphp
                @endif
                {{-- @if ($line['type'] == 6)
                    @include('forms.form_types.type_6')
                    @php
                        $key++;
                    @endphp
                @endif --}}
                @if ($line['type'] == 9)
                    @include('forms.form_types.type_9')
                    @php
                        $key++;
                    @endphp
                @endif
                @if ($line['type'] == 5 )
                    @include('forms.form_types.type_5')
                @endif
                @if ($line['type'] == 10 )
                    @include('forms.form_types.type_10')
                @endif
                @if ($line['type'] == 8)
                    @include('forms.form_types.type_8')
                @endif
                @if ($line['empty_table'] == 1)
                    <table width="100%" style="background-color: white;">
                        <tr>

                        </tr>
                    </table>
                @endif
                @if ($line['break_page_after'] == 1)
                    <div style="page-break-after: always;">
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
    {{-- @include('rapport.shared.conclusion', $pdfDeatils) --}}



</body>

</html>
