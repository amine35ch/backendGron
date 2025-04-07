@if(!empty($line['content']['fields'][0]['value']))
<table width="100%" style="border-collapse: collapse; @if ($key % 2 == 0)background-color: #f4f4ea @endif">
  <tr>
    <td style="width: 50%;border: 1px solid black;vertical-align: middle;text-align: center;">
      <p>{{$line['content']['question'] ?? ''}}</p>
    </td>
    <td style="width: 50%;border: 1px solid black;vertical-align: middle;text-align: center;">
      <p>{{$line['content']['fields'][0]['value']}}</p>
    </td>
  </tr>
</table>
@endif