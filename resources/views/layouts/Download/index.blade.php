@extends('layouts.app')

@section('content')
    <div class="fixed pin flex items-center">
        <div class="fixed pin bg-black opacity-75 z-10"></div>

        <div class="relative mx-6 md:mx-auto w-full md:w-1/2 lg:w-1/3 z-20 m-8">
            <div class="shadow-lg bg-white rounded-lg p-8">


                <h1 class="text-center text-2xl text-green-dark">Hent dokumenter</h1>
                <p class="text-xs mt-2">Heisann.no er en tjeneste for <span class="font-bold">sikker</span> og <span class="font-bold">kryptert</span> sending og mottak av dokumenter. En av dine forbindelser har brukt heisann.no for å sende deg en beskjed</p>

                <div class="w-full">
                    @include('layouts.dashboard.partials.status')
                </div>

                <form action="/message/download" method="POST" class="pt-6 pb-2 my-2">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2" for="onetimepassword">
                            Engangskode fra SMS
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="onetimepassword" name="onetimepassword" type="text" placeholder="Engangskode fra SMS" autocomplete="off">
                    </div>
                        <input id="hashed_url" name="hashed_url" type="hidden" value="{{ request()->query('hashed_url') }}">
                        <input id="email" name="email" type="hidden" value="{{ request()->query('email') }}">
                    <div class="block md:flex items-center justify-between">
                        <div>
                            <button type="submit" class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded border-b-4 border-green-darkest" type="button">
                                Hent beskjed
                            </button>
                        </div>

                        <div class="mt-4 md:mt-0">
                            <a href="/" class="text-green no-underline">Avbryt</a>
                        </div>
                    </div>
                </form>
                <a href="/" class="text-center mt-4">Les mer om heisann.no</a>
            </div>
        </div>
    </div>

@endsection