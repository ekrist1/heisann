<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Heisann.no') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/main.css') }}" rel="stylesheet">

    <!-- Scripts -->

    @include('layouts.partials.analytics')
</head>

<body class="flex flex-col min-h-screen bg-transparent font-family: 'Source Sans Pro', sans-serif">
    <div id="app">
        <div class="mx-auto mt-4 h-full">
            <div class="justify-center">

            <div class="w-full">
                <flash status="{{ session('status') }}"></flash>
            </div>

            <upload-form company_id="{{ basename(request()->path()) }}" action="{{ route('sendform') }}" method="POST" inline-template v-cloak>
                <div>

                    <div v-if="message" class="flex items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-6" role="alert">
                        @{{ message }}
                    </div>

                    <pulseloader :loading="loading"></pulseloader>

                    <div class="w-full max-w-lg mx-auto mt-4" v-if="!loading">
                        <div class="flex flex-wrap -mx-3 mb-6 p-4">

                            <div class="w-full px-3 mb-6 md:mb-0">
                                @include('layouts.partials.send_icon')
                                <p class="w-full text-grey-dark mb-4 text-center">{{ $company->name }}</p>
                            </div>

                            <Tabs :tabs-initial="tabnames"></Tabs>

                            <div class="w-full border" v-if="selectedContentTab === 'Ny melding'">

                                <div class="w-full px-3 mb-6 md:mb-0 mt-2">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                                        Fra (e-post)
                                    </label>
                                    <input class="appearance-none block w-full bg-white text-grey-darker border border-grey rounded py-3 px-4" id="grid-to" type="email" placeholder="skriv inn din e-post adresse" v-model="form.emailfrom">
                                    <span class="text-red-dark text-sm" v-if="form.errors.has('emailfrom')">*Epost er påkrevd.</span>
                                </div>

                                <div class="w-full px-3 mb-3 mt-3">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="from">
                                        Til
                                    </label>
                                    <div class="relative">
                                        <select name="emailto" class="block appearance-none w-full bg-white border border-grey text-grey-darker py-3 px-4 pr-8 rounded" v-model="form.group">
                                            <option disabled value="">Velg mottaker</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach

                                        </select>
                                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                        <span class="text-red-dark text-sm" v-if="form.errors.has('group')">*Du må velge en avsender</span>
                                    </div>
                                </div>

                                <div class="w-full px-3 mb-3">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="message">
                                        Melding
                                    </label>
                                    <textarea class="appearance-none block w-full bg-white text-grey-darker border border-grey rounded py-3 px-4 h-32" id="message" placeholder="skriv inn melding til mottaker" v-model="form.message"></textarea>
                                    <span class="text-red-dark text-sm" v-if="form.errors.has('message')">*Må fylles ut</span>
                                </div>

                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                                        Telefon
                                    </label>
                                    <input class="appearance-none block w-full bg-white text-grey-darker border border-grey rounded py-3 px-4 mb-3" id="grid-to" type="text" placeholder="skriv inn ditt telefonnummer" v-model="form.mobile">
                                    <span class="text-red-dark text-sm" v-if="form.errors.has('mobile')">Feil format.</span>
                                </div>

                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                                        Navn
                                    </label>
                                    <input class="appearance-none block w-full bg-white text-grey-darker border border-grey rounded py-3 px-4" id="grid-to" type="text" placeholder="Firmanavn eller for- og etternavn" v-model="form.from">
                                    <span class="text-red-dark text-sm" v-if="form.errors.has('from')">*Må fylles ut</span>
                                </div>

                            <div class="overflow-hidden relative w-full mt-4 mb-4 p-4">
                                <button class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 w-full inline-flex items-center justify-center">
                                    <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                    </svg>
                                    <span class="ml-2">Last opp dokumenter</span>
                                </button>
                                <input class="w-full cursor-pointer absolute block opacity-0 pin-r pin-t py-2 px-4" type="file" name="messageDocuments" @change="attachDocuments" multiple>
                                <span class="text-red-dark text-sm" v-if="form.errors.has('messageDocuments')">Maksimum 20 MB størrelse og maksimum 20 dokumenter</span>
                            </div>

                            <p class="mt-2 ml-4">Dokumenter som blir lastet opp:</p>
                            <p v-for="fileName in fileNames">
                                <span class="mr-2 ml-4">
                                    <svg fill="#000000" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 12.5C2 9.46 4.46 7 7.5 7H18c2.21 0 4 1.79 4 4s-1.79 4-4 4H9.5C8.12 15 7 13.88 7 12.5S8.12 10 9.5 10H17v2H9.41c-.55 0-.55 1 0 1H18c1.1 0 2-.9 2-2s-.9-2-2-2H7.5C5.57 9 4 10.57 4 12.5S5.57 16 7.5 16H17v2H7.5C4.46 18 2 15.54 2 12.5z"/>
                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                    </svg>
                                </span>
                                @{{ fileName }}
                            </p>

                            <div class="w-full invisible">
                                <input class="appearance-none block w-full bg-white text-grey-darker border border-grey rounded py-3 px-4 mb-3" id="grid-to" type="text" placeholder="firma eller navn" v-model="form.humantest" autocomplete="off">
                            </div>
                            <span class="text-red-dark text-sm" v-if="form.errors.has('humantest')">Feil ved verifisering. Er du en robot?.</span>

                            <div class="w-full text-center pt-8 mb-4">
                                <button class="bg-indigo-dark hover:bg-indigo text-white font-bold py-2 px-4 inline-flex items-center justify-center mt-4" @click.prevent="submitForm">
                                    <span>Send melding</span>
                                    <svg fill="#fff" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                                    </svg>
                                </button>

                            </div>

                            <div class="w-full text-center pt-8 mb-4">
                                <svg class="fill-current text-indigo mb-1" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                                <p class="text-xs">{{ $company->name }} bruker tjenesten heisann.no for sikker kommunikasjon av meldinger. Beskjeder og filer blir lastet opp kryptert og mottaker må bruke to-faktor passord for å lese beskjed. Les mer på <a href="heisann.no">Heisann.no</a> </p>
                            </div>
                        </div>
                            <div class="w-full border" v-if="selectedContentTab === 'Sikkerhet'">
                                <div class="w-full">
                                    <p class="ml-2 mt-4 text-grey-darker">
                                        Vi bruker personopplysningene dine til å besvare henvendelsen din. Når formålet med behandlingen ikke lenger er tilstede
                                        vil opplysningene slettes. Alle som spør har rett på grunnleggende informasjon om behandlinger av personopplysninger i en virksomhet etter personopplysningslovens § 18, 1. ledd.
                                        Ta kontakt med oss dersom du har spørsmål ang. vår behandling av personopplysninger.
                                    </p>
                                    <p class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 ml-2 mt-4">
                                        Sikkert skjema
                                    </p>
                                    <p class="ml-2 mt-4 mb-4 text-grey-darker">
                                        {{ $company->name }} bruker tjenesten heisann.no for sikker kommunikasjon av meldinger. Beskjeder og filer blir lastet opp kryptert
                                        og mottaker må bruke to-faktor passord for å lese beskjed. Meldinger blir maksimalt lagret i 30 dager til de slettes permanent.
                                        Du kan lese mer om sikkerhet på <a href="heisann.no">Heisann.no</a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </upload-form>

        </div>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="https://pym.nprapps.org/pym.v1.min.js"></script>
<script>
    var pymChild = new pym.Child();
    pymChild.sendHeight();
</script>

</body>
</html>