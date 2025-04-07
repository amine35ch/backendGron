@php
$shouldDisplayTable = false;
foreach ($line['content']['fields'] as $field) {
if (!empty($field['value'])) {
$shouldDisplayTable = true;
break;
}
}
@endphp
@if ($shouldDisplayTable)
<h5 >{{$line['content']['question'] ?? ''}}</h5>
<table width="100%" style="border-collapse: collapse;">
  <tr>
    <td style="border: 1px solid black;background-color: #859f37;vertical-align: middle;text-align: center">
        <p class="table-title">{{$line['content']['question'] ?? ''}}</p>
    </td>
    @foreach ($line['content']['fields'][0]['ajout'] as $index => $a)
    <td style="border: 1px solid black;background-color: #859f37;vertical-align: middle;text-align: center">
        <p class="table-title">{{$a['content']['question']}}</p>
    </td>
    @endforeach
  </tr>
    @php
        $key = null;
    @endphp                                                                                                                                                                                                                                                                    
    @foreach ($line['content']['fields'] as $index => $field)
        @if ($field['value'])
            <tr>
                <td style="border: 1px solid black;">
                    <p>{{ $field['title'] }}</p>
                </td>
                @if (in_array($field['title'], ['Plafond Comble Perdu', 'Toiture Terrasse']))
                    <td style="border: 1px solid black;"></td>
                @endif
                @foreach ($field['ajout'] as $ajout)
                    <td style="border: 1px solid black;">
                        @foreach ($ajout['content']['fields'] as $f)
                            @if ($f['value'])
                                <p>{{ $f['title'] }}</p>
                            @endif
                        @endforeach
                    </td>
                @endforeach
            </tr>
        @endif
    @endforeach
</table>
@endif
    <!-- @if(isset($line['content']['fields'][$key]['ajout']))
    @foreach ($line['content']['fields'][$key]['ajout'] as $line)
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
    @endforeach
    @endif
    @php
        $key = null;
    @endphp                                                                                                                                                                                                                                                                     -->
