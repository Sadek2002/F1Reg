@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
    </style>
</head>

<body class="background-image">
    @include('layouts.header');


    <div class="container mt-5">
        <table class="text-white mb-5" width="70%">
            <tr>
                <th colspan="3">Scoreboard Latest Race</th>
            </tr>
            <tr>
                <td style="width: 10%">#</td>
                <td style="width: 40%">Username (Not done!)</td>
                <td style="width: 25%">Time</td>
                <td style="width: 25%">Race ID</td>
            </tr>
            @php $top = 1; @endphp
            @foreach ($raceResults->sortBy('result.laptime')->take(10) as $raceResult)
                <tr>
                    <td>{{ $top++ }}</td>
                    <td>{{ $raceResult->result->user_id }}</td>
                    <td>{{ $raceResult->result->laptime }}</td>
                    <td>{{ $raceResult->race->id }}</td>
                </tr>
            @endforeach


        </table>
    </div>
    @include('layouts.footer');
</body>

</html>
