<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fiche Navette</title>
  <link rel="stylesheet" href="{{ public_path('css/shuttle_card.css') }}">
  <style>
  body {
    font-family: 'DejaVu Sans', sans-serif;
  }

  .checkmark {
    font-family: 'DejaVu Sans', sans-serif;
  }

  @page {
    margin: 50px;
  }

  td {
    padding: 0;
    margin: 0;
    padding-left: 10px;
  }

  p {
    font-size: 13px;
    margin: 4px;
  }

  .title {
    color: #637531;
    font-weight: bold;
  }

  .table-title {
    color: white;
    font-weight: bold;
  }

  .page-number {
    font-size: 12px;
    position: relative;
    color: white
  }

  .page-number::after {
    content: counter(page);
  }

  footer {
    background-color: #637531;
    width: 100%;
    height: 20px;
    text-align: center;
    position: fixed;
    bottom: -20px;
  }

  .footer-content {
    width: 40px;
    height: 20px;
    background-color: #637531;
    border-radius: 20px 20px 0 0;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 10px;
    line-height: 20px;
    z-index: 999;
  }
  </style>
</head>

<body>
  <header>
    <table style="width: 100%">
      <tr>
        <td style="width: 5%; padding: 0;">
          <div style="position: relative; height: 3.4cm;">
            <div style="background-color: #859f37; height: 2cm; position: absolute; top: 0; width: 100%;"></div>
            <div style="background-color: #637531; height: 2.4cm; position: absolute; top: 0.4cm; width: 100%;"></div>
          </div>
        </td>
        <td style="width:47%">
          <h1 class="title">Fiche<br>Navette</h1>
        </td>
        <td style="width:47%">
        </td>
      </tr>
    </table>
  </header>

  <footer>
    <div class="footer-content">
      <span class="page-number"></span>
    </div>
  </footer>

  <div style="width: 100%">
    @php
    $key = 0;
    $count = 1;
    $title = '';
    $adress = '';
    @endphp
    @foreach ($data[0]['shuttleBlocs'] as $blockey => $bloc)
    <table width="100%">
      <tr>
        <h3>
          {{ mb_strtoupper($count.'.'.$bloc['title']) }}
        </h3>
      </tr>
    </table>
    @foreach ($bloc['responses'] as $index => $line)
    @if($index == 1 && $blockey == 0)
    @php
    $adress = $line['content']['fields'][0]['value'];
    @endphp
    @continue
    @endif
    @if($index == 2 && $blockey ==0)
    @php
    $adress .= ' ' . $line['content']['fields'][0]['value'];

    @endphp
    @include('shuttle-card.types.type_1_adress')
    @php
    $key++;
    @endphp
    @continue
    @endif
    @if($line['page_break_after'])
    <div style="page-break-after: always;"></div>
    @endif
    @if ($line['input_type'] == 0)
    @include('shuttle-card.types.type_0')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 1)
    @include('shuttle-card.types.type_1')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 2)
    @include('shuttle-card.types.type_2')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 3)
    @include('shuttle-card.types.type_3')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 4)
    @if($line['title'] == 'SIGNATURE CLIENT PHOTO' && $line['input_type'] == 4)
    @continue
    @endif
    @include('shuttle-card.types.type_4')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 5)
    @include('shuttle-card.types.type_5')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 6)
    @include('shuttle-card.types.type_6')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 7)
    @include('shuttle-card.types.type_7')
    @php
    $key++;
    @endphp
    @endif
    @if ($line['input_type'] == 8)
    @include('shuttle-card.types.type_8')
    @php
    $key++;
    @endphp
    @endif
    @endforeach
    @php
    $count ++;
    @endphp
    @if($bloc['page_break_after'])
    <div style="page-break-after: always;"></div>
    @endif
    @endforeach
  </div>

</body>


</html>