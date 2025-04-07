<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reserve</title>
</head>
<style>
      body {
            font-family: DejaVu Sans, 'Calibri', sans-serif !important;
        }
    .franklin{
        font-family:"Franklin Gothic Medium" !important;
        color: white;
        text-align: center;
        margin-top:80px;
    }
    .franklin p{
        font-size: 20px;
        font-weight: bold;
    }
    p{
        font-size:13px;
    }
    .green-block{
        background-color: #90ce4e;
        color: white;
        padding: 13px;
        margin: 9px;
        width: 120%;
        position: absolute;
        z-index: 99;
    }
    .bleu-block{
        background-color: #001e5e;
        height: 55%;
        width: 200%;
        position: absolute;
        left:-10%;
        top:24%
    }
    .title{
        background-color: #90ce4e;
        color: white;
        font-size: 17px;
        font-weight: bold;

    }
    .dotted-line{
        border-bottom: dotted 1px;
        margin-top: 30px;
    }
    @page{
        margin-left:60px;
        margin-right:60px;
    }
</style>
<body>
    @foreach ($data as $bloc)
    @foreach ($bloc['fields'] as $field)
        <div>
            @if ($field['title'])
                <h4 style="{{ $field['style'] }}">{{ $field['title'] }}</h4>
            @endif
            @if ($field['type'] == 'text')
                {!! $field['data'] !!}
            @elseif ($field['type'] == 'Travaux')
            @php
                $reclamation=$project->reclamation->first();
            @endphp
                <div>
                    @if ($reclamation?->works)
                    @foreach ($reclamation->works as $works)

                    <h3>{{$works->project_work->work->reference}}</h3>
                    <p>{{$works->description}}</p>
                </div>
                @endforeach
                @endif
            @endif
        </div>
    @endforeach
@endforeach



</body>
</html>
