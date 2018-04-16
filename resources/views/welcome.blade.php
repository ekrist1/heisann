<!DOCTYPE html>
<html class="overflow-y-scroll h-full" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="font-sans text-black h-full">
<header class="absolute pin-t pin-l w-full py-4">
    <div class="flex items-center justify-between px-8">
                <span class="text-2xl tracking-tight font-semibold">
                    @include('layouts.partials.logo')
                </span>
        <div class="">
            <div class="flex items-center">
                @if(Route::has('login'))
                    <div class="absolute pin-t pin-r mt-4 mr-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="no-underline hover:underline text-sm font-bold text-blue-dark uppercase">Min konto</a>
                        @else
                            <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-blue-dark uppercase pr-6">Logg inn</a>
                            <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-blue-dark uppercase">Ny bruker</a>
                        @endauth
                    </div>
                @endif
        </div>
    </div>
    </div>
</header>
<section class="bg-blue-lightest h-full py-8">
    <div class="w-5/6 max-w-lg ml-auto mr-auto h-full">
        <div class="flex items-center justify-center text-center h-full">
            <div>
                <h1 class="text-4xl sm:text-5xl font-semibold leading-none tracking-tight mb-4">Send dokumenter og beskjeder sikkert</h1>
                <h2 class="text-2xl sm:text-3xl text-blue-darker opacity-75 font-normal leading-tight mb-8">Send sensitive dokumenter og beskjeder enkelt og sikkert</h2>
                <div class="flex flex-col sm:flex-row items-center justify-center sm:pt-3 mb-3 sm:mb-6">
                    <a class="flex items-center text-xl leading-none text-blue hover:text-blue-dark no-underline mb-2 sm:mb-0 sm:mr-4" href="#priser">
                        <div class="mr-3">
                            <svg class="align-middle" fill="currentColor" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                            </svg>
                        </div>
                        <span>
                                    Priser
                                </span>
                    </a>
                    <a class="flex items-center text-xl leading-none text-blue hover:text-blue-dark no-underline mt-2 sm:mt-0 sm:ml-4" href="#information">
                        <div class="mr-3">
                            <svg class="align-middle" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="8 12 12 16 16 12"/><line x1="12" y1="8" x2="12" y2="16"/></svg>
                        </div>
                        <span>
                                    Fordeler
                                </span>
                    </a>
                </div>
                <div class="flex flex-col sm:flex-row justify-center pt-8">
                    <a href="{{ route('register') }}">
                        <button class="bg-blue hover:bg-blue-dark text-2xl leading-none text-white font-semibold h-12 px-8 rounded-full whitespace-no-wrap mb-2 sm:mb-0 sm:mr-2">
                            Send nå
                        </button>
                    </a>
                    <a href="#information">
                        <button class="bg-transparent text-2xl leading-none text-blue font-semibold hover:text-blue-dark h-12 px-8 border border-blue-lighter hover:border-blue-light rounded-full whitespace-no-wrap mt-2 sm:mt-0 sm:ml-2">
                            Mer informasjon
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-8">
    <div class="w-5/6 max-w-lg ml-auto mr-auto mt-8 mb-8">
        <div class="flex flex-wrap -mx-6 -my-6" id="information">
            <div class="w-full sm:w-1/2 px-6 py-6">
                <div class="mb-8">
                    <svg class="align-middle text-red" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="21 8 21 21 3 21 3 8"/><rect x="1" y="3" width="22" height="5"/><line x1="10" y1="12" x2="14" y2="12"/></svg>
                </div>
                <h3 class="text-3xl sm:text-4xl font-semibold tracking-tight leading-none mb-3">Send dokumenter trygt</h3>
                <p class="text-lg sm:text-xl leading-normal text-grey-darker mb-8">Unngå å send sensitive opplysninger og personopplysninger på e-post. Med Heisann sender du dokumenter og meldinger helt trygt</p>
            </div>
            <div class="w-full sm:w-1/2 px-6 py-6">
                <div class="mb-8">
                    <svg class="align-middle text-teal" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="14.31" y1="8" x2="20.05" y2="17.94"/><line x1="9.69" y1="8" x2="21.17" y2="8"/><line x1="7.38" y1="12" x2="13.12" y2="2.06"/><line x1="9.69" y1="16" x2="3.95" y2="6.06"/><line x1="14.31" y1="16" x2="2.83" y2="16"/><line x1="16.62" y1="12" x2="10.88" y2="21.94"/></svg>
                </div>
                <h3 class="text-3xl sm:text-4xl font-semibold tracking-tight leading-none mb-3">Sikkert kontaktskjema</h3>
                <p class="text-lg sm:text-xl leading-normal text-grey-darker mb-8">La kundene dine sende deg beskjeder og dokumeneter trygt. Ingen oppstartskostnader og alltid oppdatert.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey-lightest py-8">
    <div class="w-5/6 max-w-2xl ml-auto mr-auto mt-8 mb-8">
        <div class="flex flex-wrap -mx-6 -my-6">
            <div class="w-full sm:w-1/2 lg:w-1/4 px-6 py-6">
                <div class="mb-8">
                    <svg class="align-middle text-teal" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="21 8 21 21 3 21 3 8"/><rect x="1" y="3" width="22" height="5"/><line x1="10" y1="12" x2="14" y2="12"/></svg>
                </div>
                <h3 class="text-3xl font-semibold tracking-tight leading-none mb-3">Unngå at informasjon kommer på avveie</h3>
                <p class="text-lg leading-normal text-grey-dark mb-8">Visst du at e-post er en usikker kommunikasjonskanal? Med Heisann kan du sende trygt, helt enkelt.</p>
            </div>
            <div class="w-full sm:w-1/2 lg:w-1/4 px-6 py-6">
                <div class="mb-8">
                    <svg class="align-middle text-pink" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="14.31" y1="8" x2="20.05" y2="17.94"/><line x1="9.69" y1="8" x2="21.17" y2="8"/><line x1="7.38" y1="12" x2="13.12" y2="2.06"/><line x1="9.69" y1="16" x2="3.95" y2="6.06"/><line x1="14.31" y1="16" x2="2.83" y2="16"/><line x1="16.62" y1="12" x2="10.88" y2="21.94"/></svg>
                </div>
                <h3 class="text-3xl font-semibold tracking-tight leading-none mb-3">Ikke send fødelsnummer på e-post</h3>
                <p class="text-lg leading-normal text-grey-dark mb-8">Fødselsnummer er en spesiell personopplysning, og skal ikke sende på e-post ukryptert</p>
                <a class="text-lg leading-normal text-blue hover:text-blue-dark no-underline" href="https://www.datatilsynet.no/rettigheter-og-plikter/overordnet-om-rettigheter-og-plikter/fodselsnummer/" target="_blank">Les mer hos Datatilsynet</a>
            </div>
            <div class="w-full sm:w-1/2 lg:w-1/4 px-6 py-6">
                <div class="mb-8">
                    <svg class="align-middle text-purple" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="14.31" y1="8" x2="20.05" y2="17.94"/><line x1="9.69" y1="8" x2="21.17" y2="8"/><line x1="7.38" y1="12" x2="13.12" y2="2.06"/><line x1="9.69" y1="16" x2="3.95" y2="6.06"/><line x1="14.31" y1="16" x2="2.83" y2="16"/><line x1="16.62" y1="12" x2="10.88" y2="21.94"/></svg>
                </div>
                <h3 class="text-3xl font-semibold tracking-tight leading-none mb-3">Sikker kanal</h3>
                <p class="text-lg leading-normal text-grey-dark mb-8">Dokumenter og beskjeder blir kryptert og mottaker kan kun få tilgang med passordbeskyttet lenke og engangskode på SMS</p>
            </div>
            <div class="w-full sm:w-1/2 lg:w-1/4 px-6 py-6">
                <div class="mb-8">
                    <svg class="align-middle text-orange" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="14.31" y1="8" x2="20.05" y2="17.94"/><line x1="9.69" y1="8" x2="21.17" y2="8"/><line x1="7.38" y1="12" x2="13.12" y2="2.06"/><line x1="9.69" y1="16" x2="3.95" y2="6.06"/><line x1="14.31" y1="16" x2="2.83" y2="16"/><line x1="16.62" y1="12" x2="10.88" y2="21.94"/></svg>
                </div>
                <h3 class="text-3xl font-semibold tracking-tight leading-none mb-3">Automatisk sletting</h3>
                <p class="text-lg leading-normal text-grey-dark mb-8">Dokumenter og beskjeder lastet opp til Heisann blir maksimalt lagret 30 dager før det blir slettet for alltid.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-8">
    <div class="w-5/6 max-w-lg ml-auto mr-auto mt-8 mb-8">
        <div class="flex flex-col md:flex-row items-center justify-center">
            <p class="text-xl leading-normal mr-6 mb-8 md:mb-0 text-center md:text-left">Ingen oppstartskostnader. Start nå.</p>
            <a href="{{ route('register') }}">
                <button class="bg-blue hover:bg-blue-dark text-xl leading-none text-white font-semibold h-10 px-6 rounded-full whitespace-no-wrap">
                    Opprett bruker gratis
                </button>
            </a>
        </div>
    </div>
</section>

<div class="flex justify-center">
    <div class="bg-grey-light h-1 w-16 rounded"></div>
</div>

<section class="bg-white py-8">
    <div id="priser" class="w-5/6 max-w-lg ml-auto mr-auto mt-8 mb-8">
        <div class="flex flex-col justify-center text-center pb-8">
            <h2 class="text-5xl font-semibold leading-none tracking-tight mb-4">Betal kun for det du bruker</h2>
            <h3 class="text-3xl text-blue-darker opacity-75 font-normal leading-none mb-8">Ingen oppstartskostnader. En pris - helt enkelt</h3>
        </div>

        <div class="bg-white rounded shadow-lg overflow-hidden">
            <div class="flex flex-col-reverse md:flex-row">
                <div class="flex-1">
                    <div class="bg-grey-lightest p-8">
                        <h5 class="text-xl font-semibold mb-8">Funksjoner:</h5>
                        <ul class="list-reset">
                            <li class="mb-4">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <svg class="align-middle text-teal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    </div>
                                    <p class="text-lg leading-normal">Sikker kommunikasjon</p>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <svg class="align-middle text-teal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    </div>
                                    <p class="text-lg leading-normal">Ingen startkostnader</p>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <svg class="align-middle text-teal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    </div>
                                    <p class="text-lg leading-normal">Klar til bruk</p>
                                </div>
                            </li>
                            <li class="">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <svg class="align-middle text-teal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    </div>
                                    <p class="text-lg leading-normal">Tilby kundene dine sikker opplasting av dokumenter</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col items-center p-8 h-full">
                        <div class="flex flex-1 mb-4">
                            <div class="flex self-start items-center">
                                <span class="text-3xl text-grey-dark leading-none mr-2">kr</span>
                                <span class="text-5xl font-semibold tracking-tight leading-none text-teal mr-3" style="font-size: 5.6rem;">16</span>
                                <span class="text-xl text-grey-dark leading-none">/ pr. sending</span>
                            </div>
                        </div>
                        <p class="text-xl text-grey-dark leading-none mb-2">Fullstendig <a class="text-blue font-bold" href="/prices">prisliste</a></p>
                        <a href="{{ route('register') }}">
                            <button class="bg-teal hover:bg-teal-dark text-xl leading-none text-white font-semibold h-10 px-6 rounded-full whitespace-no-wrap w-full">
                                Start nå
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="w-5/6 max-w-md ml-auto mr-auto pt-8 mt-8 mb-8">
        <div class="flex flex-wrap -mx-6 -my-6">
            <div class="w-full sm:w-1/2 px-6 py-6">
                <h3 class="text-xl font-semibold leading-tight mb-3">Kan flere i bedriften få tilgang?</h3>
                <p class="text-lg leading-normal text-grey-darker mb-8">Ja. Du kan legge til alle ansatte i bedriften din. Du administrerer selv hvem som skal få tilgang.</p>
            </div>
            <div class="w-full sm:w-1/2 px-6 py-6">
                <h3 class="text-xl font-semibold leading-tight mb-3">Er Heisann.no sikker?</h3>
                <p class="text-lg leading-normal text-grey-darker mb-8">Ja, vi krypterer både dokumenter, beskjeder og kommunikasjon. Du kan lese mer i vårt sikkerhetsdokument</p>
            </div>
            <div class="w-full sm:w-1/2 px-6 py-6">
                <h3 class="text-xl font-semibold leading-tight mb-3">Kan vi bruke Heisann til å sende konfidensielle avtaler?</h3>
                <p class="text-lg leading-normal text-grey-darker mb-8">Ja, det du kan trygt sende konfidensielle dokumenter med Heisann.no</p>
            </div>
            <div class="w-full sm:w-1/2 px-6 py-6">
                <h3 class="text-xl font-semibold leading-tight mb-3">Er dette en Norsk tjeneste?</h3>
                <p class="text-lg leading-normal text-grey-darker mb-8">Ja. Tjenesten blir utviklet i Norge og tilpasset behovene til virksomheter i Norge.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey-lightest py-8">
    <div class="w-5/6 max-w-2xl ml-auto mr-auto mt-8">
        <div class="flex flex-wrap -mx-6 -my-6">
            <div class="w-full lg:w-1/3 px-6 py-6">
                <a class="no-underline" href="#">
                    <div class="bg-pink-dark rounded shadow-lg overflow-hidden p-8">
                        <h5 class="text-2xl text-white mb-4">Enkelt og trygt</h5>
                        <p class="text-lg text-white leading-tight">Send og motta konfidendisell informasjon på en trygg måte</p>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-1/3 px-6 py-6">
                <a class="no-underline" href="#">
                    <div class="bg-red-light rounded shadow-lg overflow-hidden p-8">
                        <h5 class="text-2xl text-white mb-4">Kom raskt igang</h5>
                        <p class="text-lg text-white leading-tight">Ingen installasjonskostnad. Opprett bruker og du er i gang.</p>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-1/3 px-6 py-6">
                <a class="no-underline" href="#">
                    <div class="bg-purple-light rounded shadow-lg overflow-hidden p-8">
                        <h5 class="text-2xl text-white mb-4">Rimelig</h5>
                        <p class="text-lg text-white leading-tight">Send og motta meldinder sikkert, til samme kostnad som ett frimerke.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey-lightest py-8">
    <div class="w-5/6 max-w-xl ml-auto mr-auto my-8">
        <div class="flex md:items-center flex-col md:flex-row md:justify-between">
            <div class="mb-8 md:mb-0 md:pr-4">
                <h3 class="text-4xl font-normal tracking-tight leading-none mb-3">Skal du sende fortrolig og sensitiv informasjon?</h3>
                <h4 class="text-3xl text-grey-dark font-normal leading-tight">Bruk heisann.no til å sende og motta informasjon helt trygt</h4>
            </div>
            <div class="md:pl-4">
                <div class="flex items-center">
                    <a href="{{ route('register') }}">
                        <button class="bg-blue hover:bg-blue-dark text-xl leading-none text-white font-semibold h-10 px-6 rounded-full whitespace-no-wrap mr-2">
                            Opprett bruker
                        </button>
                    </a>
                    <a href="#priser">
                        <button class="bg-transparent text-xl leading-none text-blue font-semibold hover:text-blue-dark h-10 px-6 border border-blue-lighter hover:border-blue-light rounded-full whitespace-no-wrap ml-2">
                            Priser
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-grey-lightest">

    <div class="containe bg-grey-lighter p-8">
        <div class="sm:flex mb-4">
            <div class="sm:w-1/4 h-auto">
                <div class="text-orange mb-2">Ressurser</div>
                <ul class="list-reset leading-normal">
                    <li><a href="/security" class="hover:text-orange text-grey-darker">Sikkerhet</a></li>
                    <li><a href="/support" class="hover:text-orange text-grey-darker">Support</a></li>
                    <li><a href="/support" class="hover:text-orange text-grey-darker">Hjelpesenter</a></li>
                    <li><a href="/video" class="hover:text-orange text-grey-darker">Opplæringsfilmer</a></li>
                    <li><a href="/gdpr" class="hover:text-orange text-grey-darker">GDPR</a></li>
                </ul>
            </div>
            <div class="sm:w-1/4 h-auto sm:mt-0 mt-8">
                <div class="text-blue mb-2">Heisann.no</div>
                <ul class="list-reset leading-normal">
                    <li><a href="/about" class="hover:text-orange text-grey-darker">Om oss</a></li>
                    <li><a href="/privacy" class="hover:text-orange text-grey-darker">Personvern</a></li>
                    <li><a href="/contact" class="hover:text-orange text-grey-darker">Kontakt</a></li>
                </ul>

                <div class="text-blue-light mb-2 mt-4">Produkt</div>
                <ul class="list-reset leading-normal">
                    <li><a href="/why" class="hover:text-orange text-grey-darker">Hvorfor Heisann.no?</a></li>
                    <li><a href="/prices" class="hover:text-orange text-grey-darker">Priser</a></li>
                    <li><a href="/terms" class="hover:text-orange text-grey-darker">Vilkår</a></li>
                </ul>

            </div>

            <div class="sm:w-1/2 sm:mt-0 mt-8 h-auto">
                <div class="text-red-light mb-2">Sikker kommunikasjon</div>
                <p class="text-grey-darker leading-normal">Bedrifter bruker Heisann for sikker sending og mottak av dokumenter og beskjeder.</p>
            </div>

        </div>

        <small class="block text-sm text-grey">
            &copy; Heisann.no
        </small>

    </div>
</footer>
</body>

</html>
