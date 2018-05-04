@component('mail::message')
# Bekreftelse på betaling

@component('mail::panel')
Dette er en bekreftelse på din betaling. Du kan laste ned fakturakopi under saldo på heisann.no.
@endcomponent

## Fakturanummer: {{  $invoice['id'] }}/{{  $invoice['order_date']->format('d/m/Y') }}
Spesifikasjon:<br>
Tjeneste: Kjøp av saldo til meldinger<br>
Beløp: {{ $invoice['amount'] / 100 }},- <br>
Transaksjonsgebyr(25%): {{ $invoice['VAT'] / 100 }},- <br>
<br><br>
Totalt: {{ $invoice['sum'] / 100 }},- <br>

Takk for betalingen,<br>
Heisann.no
@endcomponent
