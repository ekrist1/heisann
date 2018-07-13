@extends('layouts.app')

@section('content')
<div class="flex items-center">
    <div class="w-5/6 sm:w-5/6 md:w-1/2 mx-auto sm:mx-auto md:mx-auto mb-6">

        <div class="text-center">
            @include('layouts.partials.img_onboarding')
        </div>

        <div class="w-full">
            @if ($errors->any())
                <div class="flex items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-6" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>Noe gikk gikk galt. Sjekk at du har fylt ut alle feltene riktig</p>
                </div>
            @endif
        </div>

        <div class="rounded shadow">
            <div class="font-medium text-lg text-white bg-blue-dark p-3 rounded-t">
                Ny bruker
            </div>
            <div class="flex bg-white p-3 rounded-b">
                <form class="w-full form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="mb-3">
                        <label for="name" class="text-right font-semibold text-grey-darker text-sm pt-2 pr-3 align-left w-full">Navn</label>
                        <div class="w-full">
                            <input id="name" type="text" class="is-input-full" name="name" value="{{ old('name') }}" placeholder="Skriv inn for- og etternavn" autofocus>
                            {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="text-right font-semibold text-grey-darker text-sm pt-2 pr-3 align-middle w-1/4">Firmanavn</label>
                        <div class="w-full">
                            <input id="name" type="text" class="is-input-full" name="company_name" value="{{ old('name') }}" placeholder="Skriv inn firmanavn" autofocus>
                            {!! $errors->first('company_name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="text-right font-semibold text-grey-darker text-sm pt-2 pr-3 align-middle w-1/4">Mobilnummer (obligatorisk)</label>
                        <div class="w-full">
                            @include('layouts.partials.country_codes')
                            <input id="name" type="text" class="is-input-full" name="phone" value="{{ old('phone') }}" placeholder="Skriv inn mobilnummer" autofocus>
                            @if ($errors->has('phone'))
                                <p class="text-red-dark text-sm mt-1 mb-2">Ikke gyldig nummer</p>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="text-right font-semibold text-grey-darker text-sm pt-2 pr-3 align-middle w-1/4">E-postadresse</label>
                        <div class="w-full">
                            <input id="email" type="email" class="is-input-full" name="email" value="{{ old('email') }}" placeholder="Skriv inn din e-post adresse" required>
                            {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="text-right font-semibold text-grey-darker text-sm pt-2 pr-3 align-middle w-1/4">Passord (min. 6 tegn)</label>
                        <div class="w-full">
                            <input id="password" type="password" class="is-input-full" name="password" placeholder="******" required>
                            {!! $errors->first('password', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="text-right font-semibold text-grey-darker text-sm pt-2 pr-3 align-middle w-1/4">Bekreft passord</label>
                        <div class="w-full">
                            <input id="password_confirmation" type="password" class="is-input-full" name="password_confirmation" placeholder="******" required>
                            {!! $errors->first('password_confirmation', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-3/4">
                            <button type="submit" class="bg-indigo-dark hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                Registrer
                            </button>
                            <a href="/" class="font-bold text-grey-darker">Avbryt</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md mt-4" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Produktet er i en beta-versjon og under test!</p>
                    <p class="text-sm">Produktet er p.t under test og det kan være enkelte ustabiliteter med tjenesten.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
