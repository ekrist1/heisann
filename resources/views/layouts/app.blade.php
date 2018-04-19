<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Heisann.no') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @include('layouts.partials.analytics')
</head>
<body class="flex flex-col min-h-screen bg-blue-lightest h-screen font-family: 'Source Sans Pro', sans-serif">
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap bg-white mb-8">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="no-underline">
                                @include('layouts.partials.logo')
                            </a>
                        @endauth

                        @guest
                            <a href="{{ url('/') }}" class="no-underline">
                                @include('layouts.partials.logo')
                            </a>
                        @endguest

                    <div class="flex items-center mr-3">
                        @guest
                            <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Logg inn</a>
                            <a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Ny bruker</a>
                        @else
                            <a class="text-grey-darker text-sm pr-4" href="{{ action('Tenant\UserManagerController@edit', ['id' => auth()->user()->id]) }}">Min profil</a>

                            <a href="{{ route('logout') }}"
                                class="no-underline hover:underline text-grey-darker text-sm"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logg ut</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
        </nav>

        @yield('content')
    </div>

    <footer class="text-center text-grey text-xs mt-auto mb-3 px-3"> <p>(c) Heisann.no -
            <a href="/help" target="_blank">Hjelpesenter</a> -
            <a href="/contact">Kontakt oss</a> -
            <a href="/privacy" target="_blank">Personvernerklæring</a>
        </p>
    </footer>

    <!-- Scripts -->
    @yield('stripe')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
