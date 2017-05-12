@component('mail::message')
# Nouveaux articles

{!! $message !!}

@component('mail::button', ['url' => 'https://app.dev/home'])
Visiter le site
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
