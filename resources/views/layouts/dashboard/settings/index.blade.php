@extends('layouts.app')

@section('content')
    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2 justify-center">

            <div class="w-full">
                <flash status="{{ session('status') }}"></flash>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ route('edit-company') }}">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Rediger firmeopplysninger</h2>
                    </div>
                </a>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ url('/dashboard/user') }}">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M16.5 12c1.38 0 2.49-1.12 2.49-2.5S17.88 7 16.5 7C15.12 7 14 8.12 14 9.5s1.12 2.5 2.5 2.5zM9 11c1.66 0 2.99-1.34 2.99-3S10.66 5 9 5C7.34 5 6 6.34 6 8s1.34 3 3 3zm7.5 3c-1.83 0-5.5.92-5.5 2.75V19h11v-2.25c0-1.83-3.67-2.75-5.5-2.75zM9 13c-2.33 0-7 1.17-7 3.5V19h7v-2.25c0-.85.33-2.34 2.37-3.47C10.5 13.1 9.66 13 9 13z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Legg til eller rediger brukere</h2>
                    </div>
                </a>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ url('/dashboard/group') }}">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.99 11L3 15l3.99 4v-3H14v-2H6.99v-3zM21 9l-3.99-4v3H10v2h7.01v3L21 9z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Avsender- og mottaksgrupper</h2>
                    </div>
                </a>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ url('/dashboard/form') }}">
                    <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                        <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-grey-darkest">Mottaksskjema</h2>
                    </div>
                </a>
            </div>

        </div>
    </div>

@endsection