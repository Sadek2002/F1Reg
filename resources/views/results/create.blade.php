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
    <div class="mt-4 p-5  text-white rounded">
        <h1>F1 Registration App | Results page</h1>
    </div>

    <div class="container mt-4">
        <div>
            <form class="w-45" method="POST" action="{{ route('results.store') }}">
                @csrf

                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                <div class="mb-3">
                    <label class="text-white form-label" for="laptime">Laptime:</label>
                    <input class="form-control" type="text" placeholder="Enter laptime" id="laptime"
                        name="laptime">
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Result</button>
            </form>
        </div>
    </div>
</body>

</html>
