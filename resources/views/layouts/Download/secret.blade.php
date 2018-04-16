@extends('layouts.app')

@section('content')

    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2 justify-center">
            <div class="w-full mb-4">
                <label class="w-full block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Melding fra</label>
                <p class="text-lg">{{ $secret_message->from }}</p>
            </div>
            <div class="w-full mb-4">
                <label class="w-full block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Melding til</label>
                <p class="text-lg">{{ $secret_message->to }}</p>
            </div>
            <div class="w-full mb-4">
                <label class="w-full block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Melding</label>
                <p class="text-lg">{{ $secret_message->body }}</p>
            </div>

            @isset($downloadlinks)
            <div class="w-full mb-4">
                <label class="w-full block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Vedlagte filer</label>
                <p class="text-lg">
                    @foreach($downloadlinks as $downloadlink)
                            <a href="{{ $downloadlink->url }}" class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                              <span>{{ $downloadlink->original_name }}</span>
                                <svg class="fill-current w-4 h-4 mr-2" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
                                <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>

                            </a>
                    @endforeach
                </p>
            </div>
            @endisset

            <div class="w-full mb-4">
                <p class="text-xs">Meldingen vil slettes automatisk {{ $secret_message->time_live->diffForHumans() }}</p>
            </div>
        </div>
        <generate-pdf :message="{{ $secret_message }}"></generate-pdf>
    </div>



@endsection

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

