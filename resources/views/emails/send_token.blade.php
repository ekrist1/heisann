@component('mail::message')
# Engangskode

Din engangskode for å logge inn på mottatte meldinger er:

## {{ $token_2fa['token_2fa'] }}

Koden er gyldig i 8 timer.

Vennlig hilsen,<br>
Heisann.no
@endcomponent
