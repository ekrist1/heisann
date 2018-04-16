@extends('layouts.app')

@section('content')

    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2 justify-center">

            <div class="w-full">
                <flash status="{{ session('status') }}"></flash>
            </div>

            <div class="w-40 md:w-48 pr-2 pb-2">
                <a href="{{ url('/dashboard/user/create') }}">
                    <div class="bg-indigo-darkest border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-dark">
                        <svg class="mt-4" fill="#FFFFFF" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9h-4v4h-2v-4H9V9h4V5h2v4h4v2z"/>
                        </svg>
                        <h2 class="text-base font-bold mt-2 text-white">Opprett ny bruker</h2>
                    </div>
                </a>
            </div>

            @foreach($users as $user)
                <div class="w-40 md:w-48 pr-2 pb-2">
                    <a href="{{ action('Tenant\UserManagerController@edit', ['id' => $user->id]) }}">
                        <div class="bg-white border border-grey-light h-32 text-center opacity-75 hover:bg-indigo-lightest">
                            <svg class="mt-4" fill="#3490DC" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
                            </svg>
                            <h2 class="text-base font-bold mt-2 text-grey-darkest">{{ $user->name }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>

@endsection