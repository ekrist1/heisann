@extends('layouts.app')

@section('content')
<send-message action="{{ route('send') }}" method="POST" inline-template>
<div>
    <pulseloader :hasfile=true :progress="form.progress" :loading="loading"></pulseloader>

<div class="w-full max-w-lg mx-auto mt-4" v-if="!loading" v-cloak>
    <div class="flex flex-wrap -mx-3 mb-6">

        <div v-if="message" class="flex w-full items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-4" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>@{{ message }}</p>
        </div>

        <div class="w-full px-3 mb-6 md:mb-0">
            <h2 class="text-center">Sikker sending</h2>
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                Til (e-post)
            </label>
            <input class="appearance-none block w-full bg-white text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-to" type="email" placeholder="skriv inn e-post til mottaker" v-model="form.emailto">
            <span class="text-red-dark text-sm" v-if="form.errors.has('emailto')">Epost er påkrevd.</span>
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="from">
                Fra
            </label>
            <div class="relative">
                <select name="emailfrom" class="block appearance-none w-full bg-white border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" v-model="form.emailfrom">
                    <option disabled value="">Velg avsender</option>
                    @foreach($groups as $group)
                        <option value="{{ $group }}">{{ $group }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
                <span class="text-red-dark text-sm" v-if="form.errors.has('emailfrom')">Du må velge en avsender</span>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-4">
        <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="mobile">
            Mobilnummer til mottaker (påkrevd)
        </label>
            @include('layouts.partials.country_codes_vue')
        <input class="is-input-full bg-white text-grey-darker"
               id="mobile" type="text" placeholder="skriv inn mobilnummer" name="mobile" v-model="form.mobile">
        <span class="text-red-dark text-sm" v-if="form.errors.has('mobile')">Feil med mobilnummer.</span>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="message">
                Melding
            </label>
            <textarea class="appearance-none block w-full bg-white text-grey-darker border border-grey-lighter rounded py-3 px-4 h-32" id="message" placeholder="skriv inn melding til mottaker" v-model="form.message"></textarea>
            <span class="text-red-dark text-sm" v-if="form.errors.has('message')">Må fylles ut</span>
        </div>
    </div>

    <div class="overflow-hidden relative w-full mt-4 mb-4">
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

    <p class="mt-2">Dokumenter som blir lastet opp:</p>
    <p v-for="fileName in fileNames">
                    <span class="mr-2">
                        <svg fill="#000000" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12.5C2 9.46 4.46 7 7.5 7H18c2.21 0 4 1.79 4 4s-1.79 4-4 4H9.5C8.12 15 7 13.88 7 12.5S8.12 10 9.5 10H17v2H9.41c-.55 0-.55 1 0 1H18c1.1 0 2-.9 2-2s-.9-2-2-2H7.5C5.57 9 4 10.57 4 12.5S5.57 16 7.5 16H17v2H7.5C4.46 18 2 15.54 2 12.5z"/>
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                        </svg>
                    </span>
        @{{ fileName }}
    </p>

    <div class="w-full text-center pt-8 mb-8">
    <button class="bg-indigo-dark hover:bg-indigo text-white font-bold py-2 px-4 inline-flex items-center justify-center mt-4" @click.prevent="submitForm">
        <span>Send melding</span>
        <svg fill="#fff" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
        </svg>
    </button>
    <a class="font-bold ml-4 text-grey-darkest" href="{{ route('dashboard') }}">Avbryt</a>

    </div>

</div>
</div>
</send-message>

@endsection