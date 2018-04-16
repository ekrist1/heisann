@extends('layouts.app')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-6">

            <header class="mt-8 pt-8 px-8">
                <h1 class="font-medium font-mono text-3xl align-baseline">
                    <svg class="fill-current text-indigo inline-block h-10 w-10" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                    Heisann</h1>
                <h2 class="text-3xl mt-8">Vi gjør kommunikasjon sikkert</h2>
            </header>



            <main class="px-8 py-4 max-w-xl">
                <p class="font-normal text-2xl text-green-darkest opacity-75 leading-normal mb-6">Menneskene bak Heisann.no er opptatt av personvern og sikker kommunikasjon gjennom Internett.
                Ny personopplysningslov stiller skjerpede krav til sikkerhet og kryptering. På bakgrunn av dette så vår sikker kommunikasjonsløsning dagens lys.</p>
                <p class="font-thin text-lg text-green-darkest opacity-75 leading-normal mb-6">Har du noen spørsmål til oss? Send oss en <a class="text-blue font-bold" href="mailto:support@epost.heisann.no">E-post</a></p>

                <img src="/images/about.jpg">
            </main>


        </div>
    </div>

@endsection