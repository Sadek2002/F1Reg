@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>

@include('layouts.header');

<body class="bg-dark">
    <div class="mt-4 p-5  text-white rounded">
        <h1>F1 Registration App | User page</h1>
    </div>

    <div class="col-8 offset-2">
        <h2>{{ $user->name . "'s Profile" }}</h2>

        <img src="" alt="">
        <p class="text-white">Name: {{ $user->name }}</p>
        <p class="text-white">Email: {{ $user->email }}</p>

        @if ($raceResults->isNotEmpty())
            <table class="text-white mb-5" width="100%">
                <tr>
                    <th>Race name</th>
                    <th>Score</th>
                </tr>
                @foreach ($raceResults as $raceResult)
                    <tr>
                        <td>{{ $raceResult->race->racename }}</td>
                        <td>{{ $raceResult->result->laptime }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-white">This user does not have any races.</p>
        @endif
    </div>

</body>

</html>
