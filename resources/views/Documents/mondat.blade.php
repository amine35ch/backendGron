<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MANDAT</title>
    <style>
        @page{
            margin-top: 35px;
            margin-bottom: 10px;
            margin-right: 70px;
            margin-left: 70px;
        }
        .title{
            font-family: Tahoma, "Trebuchet MS", sans-serif;
            position: relative;
            top:-3%;
            left: 3%;
        }
        body{
            font-family: "Trebuchet MS", Tahoma, sans-serif !important;
        }
        .line{
            list-style: none;
        }
        .line li:before {
            content: '-';
        }
        p{
            font-size: 13px;
        }
        .form p{
            font-size:11px;
        }
        .block{
            width: 45px;
            height: 30px;
            background-color:#a3d5ca;
            border-radius: 5px;
        }
    input.largerCheckbox {
            width: 40px;
            height: 40px;
        }
        .checkbox{
            height:30px;
            width: 30px;
            border:1px solid;
            background-color:#dee5ff;
        }
        .checkbox.checked {
            content: 'X';
            font-size: 30px;
            line-height: 30px;
            margin-left:5px;
            font-weight:lighter;
        }
    </style>
</head>
<body>
    <div class="block" style="position: absolute; top:54%; right:105%"></div>
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
    <div style=" width: 100%; position:relative; top:-30px;">
        <table style="width: 100%">
            <td ><img style="height: 100px;" src="{{ resource_path('images/republic-fr.png') }}" alt="repFrancaise"></td>
            <td style="width: 70%"></td>
            <td><img style="height: 100px" src="{{ resource_path('images/agence-nationale.png') }}" alt="agenceNationale"></td>
        </table>
        <img src="{{resource_path('images/cerfaEggBleu.png')}}" style="width: 90px;height:auto;position:absolute;top:15%" alt="">
    </div>
    @foreach ($data as $bloc)
        @foreach ($bloc['fields'] as $field)
            <div>
                @if ($field['title'])
                    <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
                @endif
                @if ($field['type'] == 'text')
                    {!! $field['data'] !!}
                @endif
            </div>
        @endforeach
    @endforeach

</body>
</html>
