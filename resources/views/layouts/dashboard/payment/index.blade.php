@extends('layouts.app')

@section('content')
<div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
    <div class="flex flex-wrap -mx-2 justify-center">

        <add-credit :initialcredit="{{ $company->credit or 0 }}" name="Fyll på kreditt" description="Fyll på og vær på den sikre siden" stripekey="{{ config('services.stripe.key') }}" email="{{ auth()->user()->email }}">
            <p slot="button_name">Kjøp</p>
        </add-credit>

        <a href="{{ route('invoice') }}" class="w-full font-bold text-center text-grey-dark mt-6">Kvitteringer</a>
    </div>
</div>
@endsection

@section('stripe')
    <script src="https://checkout.stripe.com/checkout.js"></script>

@endsection