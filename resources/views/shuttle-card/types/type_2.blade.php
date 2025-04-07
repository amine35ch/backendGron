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
  @foreach ($line['content']['fields'] as $field)
  <tr>
    <td style="border: 1px solid black;">
      <p>{{$field['title']}}</p>
    </td>
    <td style="background-color: #f4f4ea; border: 1px solid black;vertical-align: middle;text-align: center">
      @if ($field['value'])
      <span class="checkmark">✖</span>
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endif
