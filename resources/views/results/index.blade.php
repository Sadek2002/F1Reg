@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
</head>

@include('layouts.header');

<body class="bg-dark">
    <div class="mt-4 p-5  text-white rounded">
        <h1>F1 Registration App | Results page</h1>
    </div>

    <div class="container">
        <table class="text-white mb-5" width="70%">
            <th>User ID</th>
            <th>User name</th>
            <th>Race Name</th>
            <th>Laptime</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($raceResults as $raceResult)
                <tr>
                    <td style="width: 10%">{{ $raceResult->result->user_id }}</td>
                    <td style="width: 25%">{{ $raceResult->result->user->name }}</td>
                    <td style="width: 25%">{{ $raceResult->race->racename }}</td>
                    <td style="width: 20%">{{ $raceResult->result->laptime }}</td>
                    <td style="width: 10%"><a href="{{ route('results.edit', $raceResult->result->id) }}"
                            class="btn btn-primary">Edit</a>
                    </td>
                    <form action="{{ route('results.destroy', $raceResult->result->id) }}" method="post"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td style="width: 10%"><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this result?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
