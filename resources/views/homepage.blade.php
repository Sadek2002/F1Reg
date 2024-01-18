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
        <table class="text-white mb-5">
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
