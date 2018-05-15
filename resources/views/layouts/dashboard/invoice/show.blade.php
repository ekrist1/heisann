@extends('layouts.app')

@section('content')
    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2">

            <h3 class="mb-3">Selger</h3>
            <p class="w-full">Data-Nord ans</p>
            <p class="w-full">8006 Bodø</p>
            <p class="w-full mt-2">Organisasjonsnummer:</p>
            <p class="w-full">976 729 218</p>
            <h3 class="mb-3 mt-4">Kjøper</h3>
            <p class="w-full">{{ $company->name }}</p>
            <p class="w-full">{{ $company->address }}</p>
            <p class="w-full">{{ $company->zipcode }} {{ $company->city }}</p>
            <p class="w-full font-bold mt-4">Fakturanummer: {{  $invoice['id'] }}/{{  $invoice['order_date']->format('d/m/Y') }}</p>

            <p class="w-full font-bold mt-4">Spesifikasjon:</p>
            <p class="w-full">Kjøp av saldo til sikker mottak og sending av dokumenter og meldinger på heisann.no</p>
            <p class="w-full mt-2">Dato: {{ $invoice->order_date->format('d/m/Y') }}</p>
            <p class="w-full">Forfallsdato: {{ $invoice->order_date->format('d/m/Y') }}</p>
            <p class="w-full">Beløp: {{ $invoice->amount / 100 }},-</p>
            <p class="w-full">Transaksjonsgebyr: {{ $invoice->VAT / 100 }},-</p>
            <p class="font-bold w-full mt-2">Totalsum: {{ $invoice->sum / 100 }},-</p>

            <a class="mt-6" href="javascript:window.print()">Skriv ut</a>

        </div>
    </div>
@endsection
