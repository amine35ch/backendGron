@if ( isset($line['content']['data']) &&  isset($line['content']['data']["question"]))
    {{-- <table width="100%" style="
    border:1px solid rgb(241, 241, 241)">
        <tr>
            <td style="width: 80%" class="question row-height">
                <span>{{ $line['content']['data']['question'] }}</span>
            </td>

            @foreach ($line['content']['data']['fields'] as $field)
                @if ($field['value'])
                    <td style="width: 20%" class="response center-td  row-height">
                        <span>{{ $field['value'] }}</span>
                    </td>
                @endif
            @endforeach
        </tr>
    </table> --}}
    <div class="types_3" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; margin:0; margin-top: -38px; padding:5px;@if( $line['reference']=='1_1_119')border-bottom:8px solid #E8E7E7; @endif" >
        <table>
            <tr><td style="width: 60%">
            <p style="margin-left:40px;@if($line['reference']=='1_1_57') padding-top:25px;@endif" class="question"><b>{{ $line['content']['data']['question'] }}</b> </p>
            </td>
            <td style="width:20% "></td>
                @foreach ($line['content']['data']['fields'] as $field)
                    @if ($field['value'])
                    <td>
            <p style=" margin-left:40px; width: 20%;padding-top:15px;" class="response">{{ $field['value'] }}</p>
        </td>
                    @endif
                @endforeach
            </tr>
        </table>
    </div>

   @elseif ( isset($line['content']['data']) &&  !isset($line['content']['data']["question"]))
    {{-- <table width="100%" style="
    border:1px solid rgb(241, 241, 241)">
        <tr >
            @foreach ($line['content']['data']['fields'] as $field)
                @if ($field['value'])
                    <td style="width: 20%" class="response center-td  row-height">
                        <span style="position: relative; right:-70px;">{{ $field['value'] }}</span>
                    </td>
                @endif
            @endforeach
        </tr>
    </table> --}}

    <div class="types_3 without question" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; margin:0; margin-top: -38px; padding:5px;@if($line['reference']=='1_1_10' || $line['reference']=='1_1_110')border-bottom:8px solid #E8E7E7; @endif" >
        @foreach ($line['content']['data']['fields'] as $field)
        @if ($field['value'])
            <p style=" margin-left:40px;" class="response">{{ $field['value'] }}</p>
        @endif
        @endforeach
    </div>

@endif
