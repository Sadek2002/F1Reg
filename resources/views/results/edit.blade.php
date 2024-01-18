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

<body class="bg-dark">
    <div class="mt-4 p-5  text-white rounded">
        <h1>F1 Registration App | Results page</h1>
    </div>

    <div class="container mt-4">
        <div>
            <form action="{{ route('results.update', $result->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="laptime" class="form-label">Laptime:</label>
                    <input type="text" class="form-control" value="{{ $result->laptime }}" id="laptime"
                        name="laptime">
                </div>

                <button type="submit" class="btn btn-primary w-100">Edit Result</button>
            </form>
        </div>
    </div>
</body>

</html>
