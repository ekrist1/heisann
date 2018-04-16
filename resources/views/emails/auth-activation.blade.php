@component('mail::message')
# Heisann, du må aktivere kontoen din.

Heisann er en tjeneste for sikker sending av dokumenter og beskjeder. <br><br>
Du må aktivere kontoen din for å få tilgang.

@component('mail::button', ['url' => route('auth.activate', [
'token' => $user->activation_token,
'email' => $user->email,
])])
Aktiver konto
@endcomponent

Hilsen,<br>
{{ config('app.name') }}
@endcomponent
