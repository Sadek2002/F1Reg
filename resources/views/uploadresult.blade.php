@extends('bootstrap.app')

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Create Race</title>
</head>

@include('layouts.header');
<body class="bg-dark">
<div class="mb-3">

</div>
<div class="container mt-4">
    {{--We check if there are any errors with the user input and then display it on the website if there are.--}}
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-white form-label">{{$error}}</li>
            @endforeach
        </ul>
    @endif
<form method="POST" action="{{ route('send.score') }}">
    @csrf
    <input type="hidden" name="userId" value="{{ $userid = Auth::user()->id  }}">
    <input type="hidden" name="raceId" value="{{ $raceId }}">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Enter race score" id="racescore" name="laptime">
        <button class="btn btn-primary" type="submit">
            Send Score
        </button>

    </div>
</form>
</div>
</body>

</html>
