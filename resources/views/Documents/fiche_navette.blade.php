<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche navette</title>
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

        header {
            left: -50;
            right: -120;
            top: -71;
            position: fixed;

        }
        .page {
            position: relative;
            width: 100%;
            height: 100%;
        }

        td{
            height: 5px;
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
            page-break-inside: auto,
        }
        p{
            font-size: 11px;
            padding-left:10px;
            margin:2px;
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
            font-size:12px;
            color : #032d87;
        }
        .with-border {
           border:1px solid black";
           padding:3px
        }
        .tick{
            list-style: none;
        }
        .tick li:before {
            content: '✓';
        }
        .line{
            list-style: none;
        }
        .line li:before {
            content: '-';
        }

        header {
            position: fixed;
            top: 1°;
            text-align: center;
            font-size: 9px;
            color: rgb(68, 67, 67);
            height: 100px;

        }

        @page {
            margin-top: 90;
            margin-bottom: 80;
            margin-left: 30;
            margin-right: 30;
        }
    </style>
</head>

<body>
    <header>
        <table style="width: 100%">
            <tr>
                <td style="width:33%">
                    <img style="margin-left:50px" width="100px" height="auto" src="{{ resource_path('images/logo-mar.png') }}">
                </td>
                <td style="width:33%">
                    <p style="color:#1960a9;font-size:24px;font-weight: bolder">
                        Fiche Navette
                    </p>
                </td>
                <td style="width:33%">
                </td>
            </tr>
        </table>
    </header>
    <div class="page">
        @foreach ($data as $key => $line)
        @if($line['response']['table_type'] == 3)
        <div >

                @foreach (($line['response']['content']) as $index => $content)

                    @foreach ($content as $seconKey => $value)
                        @if ($seconKey == 'question')
                        @if ($value =='Signature')

                            <h4 style="text-align: right;margin-right:30px;">{{$value ?? null}}</h4>

                        @else
                            @if (!empty($content['answer']))
                                <ul>
                                    <li>{{$value ?? null}}</li>
                                </ul>
                            @endif
                        @endif
                        @endif
                    @endforeach
                    @foreach ($content as $seconKey => $value)
                        @if ($seconKey == 'answer')
                        <div >
                        <table style="width: 100%;page-break-inside: avoid">

                            @if ($content['question']=='Signature')

                            <td  style="width: 100%;text-align:right;" >
                                @if ($value)
                                <img src="{{$value['0']}}" style="height:100px;width :120px;">

                                @endif
                            </td>
                            @else
                            @if ($value)
                            @foreach ($value as $thirdKey => $image)

                                <td  @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                <img src="{{$image['image']}}" style="height:150px;width :320px;">
                                </td>
                                @if(($thirdKey + 1) % 2 === 0)
                                    </tr><tr>
                                @endif

                            @endforeach
                            @endif
                            @endif
                    </table>
                </div>
                        @endif
                    @endforeach

            @endforeach

        </div>
    @endif
            @if($line['response']['table_type'] == 1)
                <div style="break-inside :avoid">
                    @if(isset($line['response']['blocTitle']))<h3>{{$line['response']['blocTitle']}}</h3>@endif
                    <table style="width: 100%;border-collapse:collapse; border:1px solid black;text-align:center;page-break-inside: avoid">
                        @if($line['response']['showHeader'])
                            <thead>
                                @if (!empty($line['response']['content']))


                                <tr class="with-border" @if($key % 2)style="background-color: #93c01f" @else style="background-color: #1960a9" @endif>
                                    @foreach ($line['response']['columns'] as $column )
                                        <td class="with-border" >
                                            <p>{{$column['DisplayName']}}</p>
                                        </td>
                                    @endforeach
                                @endif
                                </tr>
                            </thead>
                        @endif
                        @foreach (($line['response']['content']) as $index => $content)
                        <tr class="with-border" @if(!$line['response']['showHeader'])style="background-color: {{ $key % 2 == 0 ? ($index % 2 == 0 ? '#bdd6ee' : '') : ($index % 2 == 0 ? '#c5e0b3' : '') }}@endif">
                            @if(count($content) == 2)
                            @foreach ($content as $seconKey => $value)
                                @if ($seconKey == 'question')
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$value ?? null}}</p>
                                    </td>
                                @endif
                            @endforeach
                            @foreach ($content as $seconKey => $value)
                                @if ($seconKey == 'answer')
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$value ?? null}}</p>
                                    </td>
                                @endif
                            @endforeach
                            @else
                            {{-- @foreach ($line['response']['content'] as $index => $content)
                            <tr class="with-border" @if(!$line['response']['showHeader'])style="background-color: {{ $key % 2 == 0 ? ($index % 2 == 0 ? '#bdd6ee' : '') : ($index % 2 == 0 ? '#c5e0b3' : '') }}@endif"> --}}
                                @if ($line['reference_question']!==4)


                                @foreach ($content as $cont)
                                <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                    <p>{{$cont ?? null}}</p>
                                </td>
                                @endforeach
                                @else
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['type'] ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['vitrage']  ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['materiaux']  ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['largeur']  ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['hauteur']  ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['nombre']  ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['orientation']  ?? null}}</p>
                                    </td>
                                    <td class="with-border" @if(!$line['response']['showHeader'])style="width: 50%" @endif>
                                        <p>{{$content['volet']  ?? null}}</p>
                                    </td>
                                    @endif
                                --}}
                            {{-- </tr>
                            @endforeach --}}
                            @endif
                        </tr>
                    @endforeach
                    </table>
                </div>
            @endif
            @if($line['response']['table_type'] == 2)
                @if(isset($line['response']['blocTitle']))<h3>{{$line['response']['blocTitle']}}</h3>@endif
            <table style="width: 100%;border-collapse:collapse; border:1px solid black;page-break-inside: avoid">
                @if($line['response']['showHeader'])
                    <thead>
                        <tr class="with-border" style="background-color: #1960a9">
                            @foreach ($line['response']['columns'] as $index => $column )
                                <td class="with-border"  @if($index % 2 ) style="width: 80%" @else style="width: 10%"@endif>
                                    <p style="color: white;text-align: center">{{$column['DisplayName']}}</p>
                                </td>
                            @endforeach
                        </tr>
                    </thead>
                @endif
                @foreach ($line['response']['content'] as $index => $content)
                    @if($index == 0)
                        <tr class="with-border">
                            <td rowspan={{count($content['type'])}} class="with-border" style="width: 10%;background-color:#9cc2e5">
                                <p>{{$content['question']}}</p>
                            </td>
                            <td class="with-border" style="width: 80%">
                                <p>{{$content['type'][0]}}</p>
                            </td>
                            <td class="with-border" style="width: 10%;background-color:#9cc2e5">
                                @if($content['answer'][0])<p style="text-align: center">x</p>@endif
                            </td>
                        </tr>
                        @break
                    @endif
                @endforeach
                @foreach ($content['type'] as $index => $type )
                    @if($index>0)
                    <tr>
                        <td class="with-border" style="width: 80%">
                            <p>{{$type}}</p>
                        </td>
                        <td class="with-border" style="width: 10%;background-color:#9cc2e5">
                            @if($content['answer'][$index])<p style="text-align: center">x</p> @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
            </table>
            <table style="width: 100%;border-collapse:collapse; border:1px solid black;page-break-inside: avoid">
                @foreach ($line['response']['content'] as $index => $content)
                @if($index == 1)
                    <tr class="with-border">
                        <td rowspan={{count($content['type'])}} class="with-border" style="width: 10%;background-color:#9cc2e5">
                            <p>{{$content['question']}}</p>
                        </td>
                        <td class="with-border" style="width: 80%">
                            <p>{{$content['type'][0]}}</p>
                        </td>
                        <td class="with-border" style="width: 10%;background-color:#9cc2e5">
                            <p>@if($content['answer'][0])<p style="text-align: center">x</p>@endif
                        </td>
                    </tr>
                    @break
                @endif
                @endforeach
                @foreach ($content['type'] as $index => $type )
                @if($index>0)
                <tr>
                    <td class="with-border" style="width: 80%">
                        <p>{{$type}}</p>
                    </td>
                    <td class="with-border" style="width: 10%;background-color:#9cc2e5">
                        @if($content['answer'][$index])<p style="text-align: center">x</p> @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
            <table style="width: 100%;border-collapse:collapse; border:1px solid black;page-break-inside: avoid">
                @foreach ($line['response']['content'] as $index => $content)
                @if($index == 2)
                    <tr class="with-border">
                        <td rowspan={{count($content['type'])}} class="with-border" style="width: 10%;background-color:#9cc2e5">
                            <p>{{$content['question']}}</p>
                        </td>
                        <td class="with-border" style="width: 80%">
                            <p>{{$content['type'][0]}}</p>
                        </td>
                        <td class="with-border" style="width: 10%;background-color:#9cc2e5">
                            @if($content['answer'][0])<p style="text-align: center">x</p>@endif
                        </td>
                    </tr>
                    @break
                @endif
                @endforeach
                @foreach ($content['type'] as $index => $type )
                @if($index>0)
                <tr>
                    <td class="with-border" style="width: 80%">
                        <p>{{$type}}</p>
                    </td>
                    <td class="with-border" style="width: 10%;background-color:#9cc2e5">
                       @if($content['answer'][$index])<p style="text-align: center">x</p>@endif
                    </td>
                </tr>
                @endif
                @endforeach
            </table>
            @endif
            <div style="margin-top: 15px"></div>
        @endforeach
    </div>
<script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
        if ($PAGE_COUNT > 1) {
            $pageText = $PAGE_NUM;
            $x = $pdf->get_width() - $pdf->get_width()/2;
            $x1 = $pdf->get_width() - 50;
            $y = $pdf->get_height() - 30;
            $y1= $pdf->get_height() - 15;
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 10;
            $pageText1="DPE-3CL";
            $pdf->text($x, $y, $pageText, $font, $size);
            $pdf->text($x1, $y1,$pageText1 , $font, $size);
        }
    ');
}
</script>
</body>
</html>
