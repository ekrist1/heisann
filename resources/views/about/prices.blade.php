@extends('layouts.app')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-4 p-4">
        <p class="text-center text-xl font-bold mb-4">Priser og betingelser for bruk av Heisann.no</p>
        <div class="px-2">
            <div class="flex flex-wrap -mx-2">
                <div class="md:w-1/2 w-full ml-auto px-2 mb-4">
                    <div class="bg-grey-light p-3">
                        <p class="font-bold mb-2">Utsendelse av meldinger</p>
                        <p>kr 16,- pr.melding inklusive 1 SMS med engangskode til mottaker. </p>
                    </div>
                </div>
                <div class="md:w-1/2 w-full mr-auto px-2 mb-4">
                    <div class="bg-grey p-3">
                        <p class="font-bold mb-2">Mottak av meldinger</p>
                        <p>kr 5,- pr.innlogging til mottatte meldinger. En innlogging gir tilgang 8 timer.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md mt-6 mb-6" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">Vilkår</p>
                    <p class="text-sm">Alle priser er eksl.mva. Du fyller på saldo for sending og mottak av meldinger. Saldo som ikke har hatt bevegelse
                        siste 12 måneder slettes. Du må ikke foreta kjøp som overstiger saloden din. Se alle <a href="/terms">vilkår</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection