@component('mail::message')
# Vi har mottatt din melding

Du har sendt en melding til {{ $secret_message->to  }}. Meldingen er mottatt og vil bli behandlet så raskt som mulig.


Hilsen,<br>
{{ config('app.name') }}

<br>
*Meldingen er sendt med <a href="https://heisann.no">Heisann.no</a> som er en tjeneste for sikker sending av dokumenter og beskjeder.
Dersom du er usikker på om dette er en legimitim melding, ta kontakt med {{ config('app.name') }}.*
@endcomponent
