@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>

<body class="background-image">
    @include('layouts.header');

    <div class="container mt-5">
        <table class="text-white mb-5" width="70%">
            <tr>
                {{-- We accses the race table and display the name of the race. --}}
                <th colspan="3">Scoreboard race: {{ $allRaces->racename }} </th>
            </tr>
            <tr>
                <td style="width: 25%">Rank</td>
                <td style="width: 25%">Username</td>
                <td style="width: 25%">Time</td>
                <td style="width: 25%">Approved at:</td>
            </tr>
            {{-- And in our for each we go into the result table and display the data in there. --}}
            @php($i = 1)
            @foreach ($allRaces->results->sortBy('laptime') as $results)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $results->user->name }}</td>
                    <td>{{ $results->laptime }}</td>
                    <td>{{ $results->updated_at }}</td>
                </tr>
                @php($i++)
            @endforeach


        </table>
    </div>
    {{-- @include('layouts.footer'); --}}
</body>

</html>
