@extends('layouts.app')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-3">
            <nav class="p-3 rounded font-sans w-full m-4">
                <ol class="list-reset flex text-grey-dark">
                    <li><a href="/dashboard" class="text-blue font-bold">Hjem</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="/dashboard/payment" class="text-blue font-bold">Saldo</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>Fakturakopi</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2 justify-center">

            @foreach($invoices as $invoice)
                @if($loop->iteration % 2 == 0)
                    <div class="w-full bg-white p-2 border-b border-grey-dark">
                @else
                    <div class="w-full bg-grey-lighter p-2 border-b border-grey-dark">
                @endif

                    <p class="w-full">Dato: {{ $invoice->order_date->format('d/m/Y') }}</p>
                    <p class="w-full">Beløp: {{ $invoice->sum / 100 }},-</p>
                    <p class="w-full mb-3 mt-2"><a href="#">Se fakturakopi</a></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection