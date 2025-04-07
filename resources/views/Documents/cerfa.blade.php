<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cerfa rapport </title>
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
            top: 40%;
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
            padding: 3px;
        }

        .with-border-f {
            border: 1px solid rgb(34, 46, 219);
            padding: 3px;
        }

        p {
            font-size: 11px
        }

        @page {
            margin-top: 30;
            margin-bottom: 0;
            margin-left: 30;
            margin-right: 30;
        }

        .line {
            list-style: none;
        }

        .line li:before {
            content: '–';
        }

        .block {
            width: 45px;
            height: 30px;
            background-color: #f9a51b;
            border-radius: 5px;
        }

        /* checked */
        .custom-checkbox {
            width: 10px;
            height: 10px;
            position: relative;
            background-color: rgb(255, 255, 255);
            border: solid 1px rgb(0, 0, 0);
            font-weight: normal;
            text-align: center;
            line-height: 20px;
        }

        .custom-checkbox.checked span {
            color: rgb(251, 251, 252);
            font-size: 15px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            text-align: center;
            position: absolute;
            top: -8.5px;
            right: -2.5px;
        }

        .custom-checkbox-container {
            text-align: center;
        }

        .custom-checkbox-container .custom-checkbox {
            display: inline-block;
            vertical-align: middle;
        }

        .tableWithBorders {
            border-collapse: collapse;
            width: 100%;
        }

        .tableWithBorders td {
            border: 1px solid black;
            padding: 4px;
        }

        /* Hide the default radio button */
        input[type="radio"] {
            display: none;
        }

        /* Style the custom checkbox */
        input[type="radio"]+label {
            position: relative;
            padding-left: 10px;
            /* Adjust the padding as needed */
            cursor: pointer;
            display: inline-block;
            line-height: 6.7px;
            /* Adjust the line height as needed */
        }

        /* Style the custom checkbox appearance */
        input[type="radio"]+label:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 7px;
            /* Adjust the width as needed */
            height: 7px;
            /* Adjust the height as needed */
            border: 1px solid #000;
            /* Checkbox border color */
            background-color: #fff;
            /* Checkbox background color */
        }

        /* Style the custom checkbox when checked */
        input[type="radio"]:checked+label:before {
            content: "\2713";
            /* Unicode character for a tick */
            text-align: center;
            line-height: 12px;
            /* Adjust the line height as needed */
            color: #000;
            /* Tick color */
        }

        .marker {
            color: #f9a51b;
        }
    </style>
</head>

<body>

    @foreach ($data as $bloc)
        @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @elseif ($field['type'] == 'occupants')
                    @if (count($occupants))
                        <div style="position:relative; top:-145px;">
                            <table style="width: 100%;" class="tableWithBorders">
                                <tr>
                                    <td style="width:17%; text-align:center;"><span
                                            style="font-size:10px;">Civilité</span></td>
                                    <td style="width: 31.5%; text-align:center;"><span
                                            style="font-size:10px;">Nom</span></td>
                                    <td style="width:31.5%; text-align:center;"><span
                                            style="font-size:10px;">Prénom</span></td>
                                    <td style="width: 20%; text-align:center;"><span style="font-size:10px;">Année de
                                            naissance</span></td>
                                </tr>
                                @foreach ($occupants as $occupant)
                                    <tr>
                                        <td style="text-align:center;">
                                            <span style="font-size:10px;margin-left:3px;">
                                                Mr <input type="checkbox" class="{Mr1Table}"
                                                    style="position:relative;top:5px;"
                                                    @if (!$occupant->civility) checked @endif> ou Mme
                                                <input type="checkbox" class="{Mme1Table}"
                                                    style="position:relative;top:5px;"@if ($occupant->civility) checked @endif>
                                            </span>
                                        </td>
                                        <td><span style="font-size:9.5px;">{{ $occupant->last_name }}</span></td>
                                        <td><span style="font-size:9.5px;">{{ $occupant->first_name }}</span></td>
                                        <td><span style="font-size:9.5px;">{{ $occupant->year_of_birth }}</span></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <div style="position:relative; top:-145px;">
                            <table style="width: 100%;" class="tableWithBorders">
                                <tr>
                                    <td style="width:17%; text-align:center;"><span
                                            style="font-size:10px;">Civilité</span></td>
                                    <td style="width: 31.5%; text-align:center;"><span
                                            style="font-size:10px;">Nom</span></td>
                                    <td style="width:31.5%; text-align:center;"><span
                                            style="font-size:10px;">Prénom</span></td>
                                    <td style="width: 20%; text-align:center;"><span style="font-size:10px;">Année de
                                            naissance</span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <span style="font-size:10px;margin-left:3px;">
                                            Mr <input type="checkbox" class="{Mr1Table}"
                                                style="position:relative;top:5px;"> ou Mme
                                            <input type="checkbox" class="{Mme1Table}"
                                                style="position:relative;top:5px;">
                                        </span>
                                    </td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <span style="font-size:10px;margin-left:3px;">
                                            Mr <input type="checkbox" class="{Mr1Table}"
                                                style="position:relative;top:5px;"> ou Mme
                                            <input type="checkbox" class="{Mme1Table}"
                                                style="position:relative;top:5px;">
                                        </span>
                                    </td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                        <span style="font-size:10px;margin-left:3px;">
                                            Mr <input type="checkbox" class="{Mr1Table}"
                                                style="position:relative;top:5px;"> ou Mme
                                            <input type="checkbox" class="{Mme1Table}"
                                                style="position:relative;top:5px;">
                                        </span>
                                    </td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                    <td><span style="font-size:9.5px;"></span></td>
                                </tr>
                            </table>
                        </div>
                    @endif
                @endif
            </div>
        @endforeach
    @endforeach

</body>

</html>
