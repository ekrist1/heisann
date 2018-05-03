@extends('layouts.app')

@section('content')

    <group-form :users="{{ $users }}" method="post" action="/dashboard/group" inline-template>

    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-6">

            <div v-if="message" class="flex w-full items-center bg-blue text-white text-sm font-bold px-4 py-3 mb-4" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>@{{ message }}</p>
            </div>

            <form class="w-full m-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <h2 class="text-center mb-6">Ny gruppe</h2>
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
                        Gruppenavn
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="name" type="text" placeholder="Navn på gruppen" name="name" v-model="form.name">
                    <span class="text-red-dark text-sm" v-if="form.errors.has('name')">Gruppenavn er obligatorisk</span>
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                        E-post (firma)
                    </label>
                    <input class="is-input-full bg-white text-grey-darker"
                           id="email" type="text" placeholder="E-post til gruppen" name="email" v-model="form.email">
                    <span class="text-red-dark text-sm" v-if="form.errors.has('email')">E-post er obligatorisk</span>
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                        Beskrivelse
                    </label>
                    <textarea class="is-input-full bg-white text-grey-darker h-16"
                              id="description" type="text" placeholder="Beskrivelse" name="description" v-model="form.description"></textarea>
                    <span class="text-red-dark text-sm" v-if="form.errors.has('description')">Ugyldig beskrivelse</span>
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="user_group">
                        Tilgang
                    </label>
                    <multiselect v-model="form.user_group" :options="options" :multiple="true" :close-on-select="false" :clear-on-select="false" :hide-selected="true" :preserve-search="true" select-label="Enter for å velge" placeholder="Gi tilgang til" label="name" track-by="name">
                    </multiselect>
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <button class="bg-indigo-dark hover:bg-indigo text-white font-bold py-2 px-4 inline-flex items-center justify-center mt-4" @click.prevent="submit">
                        <span>Lagre gruppe</span>
                    </button>

                    <a href="{{ route('settings') }}" class="ml-3 text-grey-dark font-bold">Avbryt</a>
                </div>

            </form>
        </div>
    </div>
</group-form>

@endsection