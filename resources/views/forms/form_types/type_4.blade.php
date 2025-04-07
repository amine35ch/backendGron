<style>
    .custom-checkbox {
        width: 10px;
        height: 10px;
        position: relative;
        background-color: rgb(251, 251, 252);
        border: solid 1px black;
        border-radius: 3px;
        font-weight: normal;
        text-align: center;
        line-height: 20px;
    }

    .custom-checkbox.checked {
        /* background-color: rgb(253, 254, 255); */
    }

    .custom-checkbox.checked span {
        color: rgb(251, 251, 252);
        font-size: 15px;
        color: rgb(0, 0, 0);
        font-weight: normal;
        text-align: center;
        position: absolute;
        top: -9px;
        left: -1px;
    }

    .custom-checkbox-container {
        text-align: center;
    }

    .custom-checkbox-container .custom-checkbox {
        display: inline-block;
        vertical-align: middle;
    }


</style>

@if(isset($line['content']['data']))
<table width="100%"  style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; padding:5px" >
    <tr>

        @if (isset($line['content']['data']['question']))

            <td colspan="2" style="width: 80%;text-align: left" class="question row-height">
                <span>{{$line['content']['data']['question'] . ' :' }}</span>
            </td>

        @endif
    </tr>
    <tr>
        <td width="5%"></td>
        <td width="95%">
            @foreach ($line['content']['data']['fields'] as $field)

                <table style="margin-bottom: 5px ">
                    <tr>
                        <td style="vertical-align: middle;">
                            @if ($field['value'] == 1)
                                <div id="custom-checkbox-{{ $field['id'] }}" class="custom-checkbox checked">
                                    <span style="font-family: DejaVu Sans, sans-serif;">✔</span>
                                </div>
                            @else
                                <div id="custom-checkbox-{{ $field['id'] }}" class="custom-checkbox">
                                    <span>&nbsp;</span>
                                </div>
                            @endif
                        </td>
                        <td style="text-align: left;">
                            @if ($field['value'] == 1)
                                <span class="response"
                                    for="custom-checkbox-{{ $field['id'] }}">{{ $field['title'] }}</span>
                            @else
                                <span style="color: rgb(26, 53, 87);font-size: 12px;"
                                    for="custom-checkbox-{{ $field['id'] }}">{{ $field['title'] }}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            @endforeach
        </td>
    </tr>
</table>
@endif
