<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/app.css">

    {{--    <style> --}}
    {{--        /* Stel de achtergrondafbeelding in voor de <main> sectie */ --}}
    {{--        main { --}}
    {{--            background-image: url('{{ asset('/images/image.png') }}'); --}}
    {{--            background-size: cover; /* Schaal de afbeelding om de volledige achtergrond te bedekken */ --}}
    {{--            background-position: center; /* Plaats de afbeelding in het midden van de achtergrond */ --}}
    {{--            height: 100vh; /* Stel de hoogte in op 100% van de viewporthoogte */ --}}
    {{--            margin: 0; /* Verwijder marges om de afbeelding op volledige breedte en hoogte te tonen */ --}}
    {{--            padding: 0; /* Verwijder padding om de afbeelding op volledige breedte en hoogte te tonen */ --}}
    {{--        } --}}



    {{--        /* Voeg wat stijlen toe aan de inhoud van <main> */ --}}
    {{--        main h1 { --}}
    {{--            color: white; --}}
    {{--            text-align: center; --}}
    {{--            padding: 20px; --}}
    {{--        } --}}
    {{--    </style> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">users</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('leaderboards') }}" class="nav-link">leaderboards</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">

            @yield('content')
        </main>
    </div>
</body>

</html>
