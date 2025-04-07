@component('mail::layout')
    {{-- Header --}}
@slot('header')
@component('mail::header')
<img src="{{ resource_path('images/logo-mar.png') }}" alt="Society Logo">
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Grone. Tous droits réservés.
@endcomponent
@endslot
@endcomponent
