
<table width="100%" @if ($key % 2 == 0) style="background-color: #d8dbdf" @endif>
    @php
        $borderColor = $key % 2 == 0 ? 'rgb(235,235,243)' : '#d8dbdf';
    @endphp
    <tr>
        <td style="width: 50%" class="question row-height">
            {{-- <span>{{ $line['content']['data']['question'] }}</span> --}}
        </td>
        @php
            $countCols = count($line['content']['data']['fields'][0]['ajout']);
            $widthCols = str(50 / $countCols) . '%';
        @endphp
        @foreach ($line['content']['data']['fields'][0]['ajout'] as $field)
            <td width="{{ $widthCols }}" style="text-align: center" class="question row-height">
                <span>{{ $field['question'] }}</span>
            </td>
        @endforeach
    </tr>
    @foreach ($line['content']['data']['fields'] as $field)
        @php
            $newArray = [];
            foreach ($field['ajout'] as $ajout) {
                if ($ajout['type'] == 1) {
                    foreach ($ajout['fields'] as $value) {
                        if ($value['value'] == 1) {
                            array_push($newArray, $value['title']);
                            break;
                        }
                    }
                }
                if ($ajout['type'] == 3) {
                    if ($ajout['fields'][0]['value'] != '') {
                        array_push($newArray, $ajout['fields'][0]['value']);
                    }
                }
            }
        @endphp
        @if (count($newArray) > 0)
            <tr>
                <td style="width: 50%;border-top: 1px solid {{ $borderColor }};" class="question row-height">
                    <span>{{ $field['title'] }}</span>
                </td>
                @foreach ($newArray as $ajout)
                    <td width="{{ $widthCols }}"
                        style="text-align: center;font-weight: bold;border-top: 1px solid {{ $borderColor }};"
                        class="question row-height">
                        <span>{{ $ajout }}</span>
                    </td>
                @endforeach
            </tr>
        @endif
    @endforeach
</table>
