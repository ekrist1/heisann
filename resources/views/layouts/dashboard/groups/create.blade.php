@extends('layouts.app')

@section('content')

    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            @if ($errors->any())
                <div class="w-full">
                    <flash status="Feil ved lagring. Rett opp feil og prøv på nytt"></flash>
                </div>
            @endif

            <form method="POST" action="/dashboard/group" class="w-full m-6">
                @csrf
                <div class="w-full px-3 mb-6 md:mb-0">
                    <h2 class="text-center mb-6">Ny gruppe</h2>
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                        Gruppenavn
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="name" type="text" placeholder="Navn på gruppen" name="name" value="{{ old('name') }}">
                    {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                        E-post (firma)
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="email" type="text" placeholder="E-post til gruppen" name="email" value="{{ old('email')}}">
                    {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                        Beskrivelse
                    </label>
                    <textarea class="is-input-full bg-white text-grey-darker h-16"
                              id="description" type="text" placeholder="Beskrivelse" name="description" value="{{ old('description') }}"></textarea>
                    {!! $errors->first('address', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <button class="bg-indigo-dark hover:bg-indigo text-white font-bold py-2 px-4 inline-flex items-center justify-center mt-4" type="submit">
                        <span>Lagre gruppe</span>
                    </button>

                    <a href="{{ route('settings') }}" class="ml-3 text-grey-dark font-bold">Avbryt</a>
                </div>

            </form>
        </div>
    </div>


@endsection