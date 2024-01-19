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
    <div>
        <form method="GET" action="{{ route('racescore') }}">
            <label>
                <input type="text" name="search" placeholder="Find Race">
            </label>
        </form>
    </div>
</div>
<div>
    <table class="text-white mb-5" width='25%'>
        <tr>
            <th width='50%'>Race nr</th>
            <th width='50%'>All races</th>
        </tr>
        @php($i = 1)
        @foreach ($races as $racess)
            <tr>
                <td>{{ $i }}</td>
                <td><a class="text-decoration-underline text-white" href="{{ route('leaderboard', $racess->id) }}">{{ $racess->racename }}</a></td>
            </tr>
            @php($i++)
        @endforeach
    </table>
</div>
{{-- @include('layouts.footer'); --}}
</body>

</html>
