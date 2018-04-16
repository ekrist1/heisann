@extends('layouts.app')

@section('content')

    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            @if ($errors->any())
                <div class="w-full">
                    <flash status="Feil ved lagring. Rett opp feil og prøv på nytt"></flash>
                </div>
            @endif

            <form method="POST" action="/dashboard/company/update">
                @csrf
                @method('PATCH')
                <div class="w-full px-3 mb-6 md:mb-0">
                    <h2 class="text-center mb-6">Oppdater firmaopplysninger</h2>
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                        Firmanavn
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                       id="name" type="text" placeholder="skriv inn firmanavn" name="name" value="{{ old('name', $company->name) }}">
                    {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                        Adresse
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                       id="address" type="text" placeholder="skriv inn adresse" name="address" value="{{ old('address', $company->address) }}">
                    {!! $errors->first('address', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="address">
                        By
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="address" type="text" placeholder="skriv inn by" name="city" value="{{ old('city', $company->city) }}">
                    {!! $errors->first('city', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="zipcode">
                        Postnummer
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="zipcode" type="text" placeholder="skriv inn postnummer" name="zipcode" value="{{ old('zipcode', $company->zipcode) }}">
                    {!! $errors->first('zipcode', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="organization_number">
                        Organisasjonsnummer
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="organization_number" type="text" placeholder="skriv inn organisasjonsnummer" name="organization_number" value="{{ old('organization_number', $company->organization_number) }}">
                    {!! $errors->first('organization_number', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="domain">
                        Din nettadresse (Domene)
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="domain" type="text" placeholder="skriv inn domene (f.eks sol.no)" name="domain" value="{{ old('domain', $company->domain) }}">
                    {!! $errors->first('domain', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                        E-post (firma)
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="email" type="text" placeholder="skriv inn bedriftens e-post" name="email" value="{{ old('email', $company->email) }}">
                    {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                <button class="bg-indigo-dark hover:bg-indigo text-white font-bold py-2 px-4 inline-flex items-center justify-center mt-4" type="submit">
                    <span>Lagre oppdateringer</span>
                </button>

                <a href="{{ route('settings') }}" class="ml-3 text-grey-dark font-bold">Avbryt</a>
                </div>

            </form>
        </div>
    </div>


@endsection