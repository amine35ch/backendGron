@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://ci3.googleusercontent.com/meips/ADKq_NbqSLOfqYD4mQjddmdXWCLdt3h8lMqbf-uDUbWRdZ_vorWWqJC6spBOhg7XUBzOHYLVkIBwuBMotsop=s0-d-e1-ft#https://i.ibb.co/GdhjJfx/logo-mar.png" style="width: 140px;height:120px;" alt="Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
