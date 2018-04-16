@component('mail::message')
# Du har mottatt en ny melding fra {{ $secret_message->from }}

Du vil motta en SMS-kode for å laste ned meldingen.

@component('mail::button', ['url' => route('download', [
'hashed_url' => $secret_message->hashed_url,
'email' => $secret_message->to,
])])
    Last ned melding
@endcomponent

Hilsen,<br>
{{ config('app.name') }}

<br>
*Meldingen er sendt med <a href="https://heisann.no">Heisann.no</a> som er en tjeneste for sikker sending av dokumenter og beskjeder.
Dersom du er usikker på om dette er en legimitim melding, ta kontakt med {{ config('app.name') }}.*
@endcomponent
