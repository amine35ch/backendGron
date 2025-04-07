@if ( isset($line['content']['data']))
    <table width="100%" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; @if($line['reference']=='1_1_22'||$line['reference']=='1_1_34'||$line['reference']=='1_1_186'||$line['reference']=='1_1_100')border-bottom: 8px solid #E8E7E7;@endif" >
        <tr>
            @if ( isset($line['content']['data']['question']))
            <td style="width: 80%" class="question row-height">

                <span>{{$line['content']['data']['question'] }}</span>

            </td>
            @endif
            @if ( !isset($line['content']['data']['question']))
            <td style="width: 5%" class="question row-height">

                <span>{{$line['content']['data']['question'] }}</span>

            </td>
            @endif
            @php
                $selectedField = '';
                $title = '';
                foreach ($line['content']['data']['fields'] as $field) {
                    if ($field['value']) {
                        $selectedField = $field;
                        $title = $field['title'];
                        break;
                    }
                }
            @endphp
            @if (!isset($line['content']['data']['question']))
            <td   style="width: 95%"  class="response center-td  row-height">
                <span>{{ $title }} </span>
            </td>
            @endif
            @if (isset($line['content']['data']['question']))
            <td   style="width: 20%"  class="response center-td  row-height">
                <span>{{ $title }} </span>
            </td>
            @endif
        </tr>
        @php
            try {
                $subLines = $selectedField['ajout'];
            } catch (\Throwable $th) {
                $subLines = [];
            }
        @endphp
    </table>
    @php
        $sublineKey = $key % 2 == 0 ? 1 : 0;
    @endphp
    @foreach ($subLines as $subLine)
        @if ($subLine['type'] == 1)
            @if ($subLine['type'] == 1)
                <table width="100%" style=" background-color: #d8dbdf border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7;">
                    <tr>
                        <td style="width: 55%" class="sub-question row-height">
                            <span>{{ $subLine['question'] }}</span>

                            <span>&#8226;&nbsp;{{ $subLine['question'] }}</span>
                        </td>
                        @php
                            $value = '';
                            foreach ($subLine['fields'] as $field) {
                                if ($field['value']) {
                                    $value = $field['title'];
                                }
                            }
                        @endphp
                        <td style="width: 20%"></td>
                        <td style="width: 25%" class="response center-td  row-height">
                            <span>{{ $value }}</span>
                        </td>
                    </tr>
                </table>

            @endif
        @else
            @if ($subLine['display_type'] == 1)
                <table width="100%" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7;@if($line['reference']=='1_1_45'||$line['reference']=='1_1_47')border-bottom: 8px solid #E8E7E7;@endif" >
                    <tr>
                        <td style="width: 80%" class="sub-question row-height">

                            <span>{{ $subLine['question'] }} @if (isset($subline['question'])) Préciser : @endif</span>

                        </td>
                        @foreach ($subLine['fields'] as $field)
                            @if ($field['value'])

                                <td style="width: 20%"  class="response center-td  row-height">
                                    <span> {{ $field['value'] }}</span>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                </table>
                @endif
                @endif

    @endforeach


    @foreach ($subLines as $subLine)
        @if ($subLine['type'] == 1)
            @if ($subLine['display_type'] == 1)
                <table width="100%" >
                    <tr>
                        <td style="width: 80%" class="sub-question row-height">
                            <span>&#8226;&nbsp;{{ $subLine['question'] }}</span>
                        </td>
                        @php
                            $value = '';
                            foreach ($subLine['fields'] as $field) {
                                if ($field['value']) {
                                    $value = $field['title'];
                                }
                            }
                        @endphp
                        <td style="width: 20%" class="response center-td  row-height">
                            <span>{{ $value }}</span>
                        </td>
                    </tr>
                </table>
            @endif
        @endif
    @endforeach
@endif
