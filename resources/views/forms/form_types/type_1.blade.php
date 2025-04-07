
@if (isset($line['content']['data']) &&  isset($line['content']['data']["question"]))
    {{-- <table width="100%" @if ($key % 2 == 0) style="background-color: #f8f8f8;
    border:1px solid rgb(255, 255, 255)" @endif>
        <tr>
            <td style="width: 80%" class="question row-height">

                <span>{{  $line['content']['data']['question'] }}</span>

            </td>
            @php
                $value = '';
                foreach ($line['content']['data']['fields'] as $field) {
                    if ($field['value'] !=0) {
                        $value = $field['title'];
                        break;
                    }
                }

            @endphp
            <td style="width: 20%" class="response center-td  row-height">
                <span>{{ $value }}</span>
            </td>
        </tr>
    </table> --}}
    <div class="type_1" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; margin:0; margin-top: -38px; padding:5px; @if($line['reference']=='1_1_137' || $line['reference']=='1_1_119'||$line['reference']=='1_1_59'||$line['reference']=='1_1_73'||$line['reference']=='1_1_76'||$line['reference']=='1_1_90'|| $line['reference']=='1_1_134')border-bottom:8px solid #E8E7E7; @endif" >
        {{-- <p style="padding-top: 20px; margin-left:40px;"><b>enfants de moins de 6 ans </b> </p> <span style="display: inline">Oui</span> --}}
        <table style=" padding-top: 30px ;width:100%; " class="with question">
            <tr>
                <td class="question" style="width:55%">{{  $line['content']['data']['question'] }} </td>
                <td style="width:20%"></td>
                @php
                $value = '';
                foreach ($line['content']['data']['fields'] as $field) {
                    if ($field['value'] !=0) {
                        $value = $field['title'];
                        break;
                    }
                }

                @endphp
                <td style="width: 25%" class="response">{{ $value }}</td>
            </tr>
        </table>
    </div>
    @elseif ( isset($line['content']['data']) &&  !isset($line['content']['data']["question"]))
    {{-- <table width="100%" style="
    border:1px solid rgb(241, 241, 241)">
       <tr>
        @php
            $value = '';
            foreach ($line['content']['data']['fields'] as $field) {
                if ($field['value'] !=0) {
                    $value = $field['title'];
                    break;
                }
            }

        @endphp
        <td style="width: 80%;" class="response center-td  row-height">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $value }}</span>
        </td>
    </tr>
    </table> --}}
    <div class="type_1" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; margin:0; margin-top: -38px; padding:5px;" >
        <table style=" padding-top: 30px ;width:100%; " class="without question">
            <tr>
                @php
                $value = '';
                foreach ($line['content']['data']['fields'] as $field) {
                    if ($field['value'] !=0) {
                        $value = $field['title'];
                        break;
                    }
                }

                @endphp
                <td class="response">{{ $value }}</td>
            </tr>
        </table>
    </div>

@endif
