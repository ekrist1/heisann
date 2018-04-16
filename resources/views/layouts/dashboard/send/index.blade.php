@extends('layouts.app')

@section('content')

    <div class="px-6 pb-8 pt-20 md:pt-16 w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-2">

            <h3 class="mb-2">Sendte meldinger</h3>

            @foreach($messages as $message)
            <div class="overflow-hidden bg-white rounded w-full shadow-lg leading-normal mb-2">
                <div class="block group p-4 border-b">
                    <p class="font-bold text-lg mb-1 text-black">Til: {{ $message->to }}</p>
                    <p class="text-sm mb-1 text-black">Engangskode: {{ $message->onetimecode->code }}</p>
                    <p class="text-sm mb-1 text-black">Sendt: {{ $message->created_at }} Slettes: {{ $message->time_live->format('d-m-Y') }} </p>
                    <p class="text-grey-darker mb-2">{{ str_limit($message->body, 20) }}</p>

                    @if($message->is_read)
                        <p class="text-xs text-green mb-2">Medlingen er lest</p>
                        @else
                        <p class="text-xs text-red mb-2">Medlingen er ulest</p>
                    @endif
                </div>
            </div>

            @endforeach

                {{ $messages->links() }}

        </div>
    </div>


@endsection
