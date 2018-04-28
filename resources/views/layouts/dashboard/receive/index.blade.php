@extends('layouts.app')

@section('content')

    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2">

            <div class="w-full">
                <flash status="{{ session('status') }}"></flash>
            </div>

            <h3 class="text-left mb-2">Mottatte meldinger</h3>

            <form action="" method="GET">
                <div class="flex w-full">
                    <div class="flex-grow text-grey-darker text-center px-1 py-2 ml-2 mb-2 mt-2">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker h-12" type="text" name="name" placeholder="Søk etter e-postadresse" >
                    </div>
                    <div class="flex-no-grow text-grey-darkest text-center py-2 mb-2 mt-2 mr-2">
                        <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded h-12">Søk</button>
                    </div>
                </div>
            </form>


            @foreach($messages as $message)
                <div class="overflow-hidden bg-white rounded w-full leading-normal mb-2">
                    <p class="text-white bg-blue text-center p-1">Gruppe: {{ $message->group->name }}</p>
                    <div class="block group p-4 border-b">
                        <p class="font-bold text-lg mb-1 text-black">Fra: {{ $message->from }}</p>
                        <p class="text-sm mb-1 text-black">Sendt: {{ $message->created_at }} Slettes: {{ $message->time_live->format('d-m-Y') }} </p>
                        <p class="text-grey-darker mb-2">{{ $message->body }}</p>

                        @foreach($message->files as $file)
                            <a href="{{ url()->current() }}?file_id={{  $file->uuid }}" class="bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center mb-2">
                                <span>{{ $file->original_name }}</span>
                                <svg class="fill-current w-4 h-4 mr-2" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                            </a>
                        @endforeach
                    </div>
                    <div class="border-b-2">
                        <div class="flex mb-2 ml-2 mt-2">
                            <generate-pdf :message="{{ $message }}"></generate-pdf>
                            <a class="text-grey-darkest font-bold items-center ml-3" href="#">
                               <confirm-delete deleteurl="{{ action('Tenant\ReceiveController@destroy', ['id' => $message->id]) }}"></confirm-delete>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

            {{ $messages->links() }}

        </div>
    </div>


@endsection

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>