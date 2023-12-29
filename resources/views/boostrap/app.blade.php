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
