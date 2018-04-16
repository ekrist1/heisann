@component('mail::message')
# Du har mottatt en ny melding fra {{ $secret_message->received_from }}

Du kan lese meldingen ved å logge deg inn på heisann.no.


Hilsen,<br>
{{ config('app.name') }}


@endcomponent
