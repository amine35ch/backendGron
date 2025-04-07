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
<table width="100%" style="border-collapse: collapse;">
  <tr>
    <td style="width: 80%; border: 1px solid black;background-color: #859f37;vertical-align: middle;text-align: center">
        <p class="table-title">{{$line['content']['question'] ?? ''}}</p>
    </td>
    <td style="width: 20%; border: 1px solid black;background-color: #859f37;vertical-align: middle;text-align: center">
        <p class="table-title">Case à cocher</p>
    </td>
  </tr>
    @php
        $key = null;
    @endphp                                                                                                                                                                                                                                                                    
  @foreach ( $line['content']['fields'] as $index => $field )
  <tr>
    <td style="border: 1px solid black;">
      <p>{{$field['title']}}</p>
    </td>
    <td style="background-color: #f4f4ea; border: 1px solid black;vertical-align: middle;text-align: center">
        @if ($field['value'])
           @php
            $key = $index
           @endphp                                                                                                                                                                                                                                                                    
           ✖ 
        @endif
    </td>
  </tr>
  @endforeach
</table>
    @if(isset($line['content']['fields'][$key]['ajout']))
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
    @endphp                                                                                                                                                                                                                                                                    
@endif