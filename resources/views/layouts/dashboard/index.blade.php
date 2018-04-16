@extends('layouts.app')

@section('content')
    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2 justify-center">
            <div class="w-full text-center">
                <animate-text>
                    <p class="text-xl mb-6">Velkommen, {{ config('app.name') }}</p>
                </animate-text>
            </div>

            <div class="w-full">
                <flash status="{{ session('status') }}"></flash>
            </div>

            <div class="w-full text-center">
              @if(is_null($company->zipcode) || is_null($company->city) )
                <div class="flex items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-6" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>Firmaprofil er ikke fylt ut. Gå til innstillinger og legg inn firmadetaljer</p>
                    </div>
              @endif
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="/dashboard/send">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M21 8V7l-3 2-3-2v1l3 2 3-2zm1-5H2C.9 3 0 3.9 0 5v14c0 1.1.9 2 2 2h20c1.1 0 1.99-.9 1.99-2L24 5c0-1.1-.9-2-2-2zM8 6c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H2v-1c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1zm8-6h-8V6h8v6z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Send sikker melding</h2>
                    </div>
                </a>
            </div>
            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="/dashboard/receive">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-618-3000H782V600H-618zM0 0h24v24H0z" fill="none"/>
                            <path d="M20 6H10v6H8V4h6V0H6v6H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Mottatte meldinger</h2>
                    </div>
                </a>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ route('settings') }}">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm7-7H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.11 0 2-.9 2-2V5c0-1.1-.89-2-2-2zm-1.75 9c0 .23-.02.46-.05.68l1.48 1.16c.13.11.17.3.08.45l-1.4 2.42c-.09.15-.27.21-.43.15l-1.74-.7c-.36.28-.76.51-1.18.69l-.26 1.85c-.03.17-.18.3-.35.3h-2.8c-.17 0-.32-.13-.35-.29l-.26-1.85c-.43-.18-.82-.41-1.18-.69l-1.74.7c-.16.06-.34 0-.43-.15l-1.4-2.42c-.09-.15-.05-.34.08-.45l1.48-1.16c-.03-.23-.05-.46-.05-.69 0-.23.02-.46.05-.68l-1.48-1.16c-.13-.11-.17-.3-.08-.45l1.4-2.42c.09-.15.27-.21.43-.15l1.74.7c.36-.28.76-.51 1.18-.69l.26-1.85c.03-.17.18-.3.35-.3h2.8c.17 0 .32.13.35.29l.26 1.85c.43.18.82.41 1.18.69l1.74-.7c.16-.06.34 0 .43.15l1.4 2.42c.09.15.05.34-.08.45l-1.48 1.16c.03.23.05.46.05.69z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Innstillinger</h2>
                    </div>
                </a>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ url('/dashboard/payment') }}">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Saldo</h2>
                    </div>
                </a>
            </div>

            <div class="w-full text-center mt-6">
                <a href="/dashboard/index" class="font-bold text-grey-darker border-b-2 border-grey-dark">Sendte beskjeder</a>
            </div>

        </div>
    </div>

@endsection
