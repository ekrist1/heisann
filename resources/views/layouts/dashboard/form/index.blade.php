@extends('layouts.app')

@section('content')

    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-3">
            <nav class="p-3 rounded font-sans w-full m-4">
                <ol class="list-reset flex text-grey-dark">
                    <li><a href="/dashboard" class="text-blue font-bold">Hjem</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="/dashboard/settings" class="text-blue font-bold">Innstillinger</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li>Mottaksskjema</li>
                </ol>
            </nav>
        </div>
    </div>

    @if (count($group) > 0)
        <div class="w-full max-w-lg mx-auto mt-4">
            <div class="flex flex-wrap -mx-3 mb-6">

                <p class="w-full mb-2 font-bold">Lenke til mottaksskjema: </p>
                <a class="w-full" href="{{ $contactFormUrl }}" target="_blank">{{ $contactFormUrl }}</a>

                <p class="mt-3 mb-2 font-bold">Embed-kode til skjema:</p>
                <input class="w-full block text-grey-darker text-sm font-bold mb-2" value="{{ $contactFormIframe }}">
                <p class="text-xs">Denne embed-koden kan du legge inn på Wordpress eller andre publiseringsplattformer for
                    å vise mottaksskjemaet på nettsiden din. </p>
            </div>
        </div>
    @else
        <div class="w-full max-w-lg mx-auto mt-4">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
                    <div class="flex">
                        <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                        <div>
                            <p class="font-bold">Du må opprette en gruppe før du kan benytte mottaksskjema</p>
                            <p class="text-sm mb-4">Mottaksskjema lar kundene dine sende deg konfidensielle dokumenter. Før du
                            kan bruke mottaksskjema må opprette en gruppe.</p>
                            <a class="text-grey-dark font-bold border-b-2" href="/dashboard/group">Opprett en gruppe nå</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection