@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .background-image {
            background-image: url('images/background-image.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            flex: 1;
        }

        table {
            border-radius: 10px;
            border: 1px solid white;
            background-color: #484444;
            margin: auto;
            width: 50%;
            z-index: 1;
            position: relative;
        }

        table.text-white {
            border-collapse: separate;
            border-spacing: 10px;
        }
    </style>
</head>

<body class="background-image">
    @include('layouts.header');


    <div class="container mt-5">
        <div>
            <form method="GET" action="{{ route('racescore') }}">
                <label>
                    <input type="text" name="search" placeholder="Find Race">
                </label>
            </form>
        </div>

        <table class="text-white mb-5">
            {{-- with count 0 we check if the race variable has any elements, if it does it will execute the for each and show the date else it will give u an option to redirect --}}
            @if ($race->count() > 0)
                <tr>
                    <th colspan="3">Scoreboard Latest Race: {{ $race[0]->racename }}</th>
                </tr>
                <tr>
                    <td style="width: 25%">Rank</td>
                    <td style="width: 40%">Username</td>
                    <td style="width: 25%">Time</td>
                    <td style="width: 25%">Approved at:</td>
                </tr>
                {{-- We accses the race table and display the name of the race. --}}
                {{-- And in our for each we go into the result table and display the data in there. --}}
                @php($i = 1)
                @foreach ($race[0]->results->sortBy('laptime') as $results)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $results->user->name }}</td>
                        <td>{{ $results->laptime }}</td>
                        <td>{{ $results->updated_at }}</td>
                    </tr>
                    @php($i++)
                @endforeach


        </table>
    @else
        <h1>Hey the race u tried searching for does not exist.</h1>
        <a href="{{ route('leaderboards') }}">Click me to go back to Leaderboards</a>
        @endif
    </div>
    {{-- @include('layouts.footer'); --}}
</body>

</html>
