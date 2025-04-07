{{-- <table width="100%" style="background-color: #edeff1;">
    <tr>
        <td class="sub-sub-title">
            <h5>
                {{ $line['title'] }}
            </h5>
        </td>
    </tr>
</table> --}}

@if ($line['title'] !=='Adresse:')
<div class="type_5" style="padding-bottom:15px; border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7;border-top: 8px solid #E8E7E7;@if($line['reference']=='1_1_11'||$line['reference']=='1_1_35'|| $line['reference']=='1_1_46'|| $line['reference']=='1_1_74'|| $line['reference']=='1_1_87'|| $line['reference']=='1_1_101'|| $line['reference']=='1_1_135') page-break-before: always; @endif ">
    <h4 style="position: relative;  left:10px;"> {{  $line['title'] }}</h4>
    <hr style="border-top:2px solid black margin-top:5px;">
</div>
@else
<div class="types_3" style="border-left: 8px solid #E8E7E7;border-right: 8px solid #E8E7E7; margin:0; margin-top: -38px; padding:5px; padding-top:10px;" >
    <p style="margin-left:40px;"><b>{{ $line['title'] }}</b> </p>
</div>

@endif
