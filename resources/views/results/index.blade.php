@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
    <style>
        .container {
            margin: 10px;
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

<body class="bg-dark">
    <div class="mt-4 p-5  text-white rounded">
        <h1>F1 Registration App | Results page</h1>
        <a href="{{ route('results.create') }}" class="btn btn-sm btn-outline-light">Create Result</a>
    </div>

    <div class="container">
        <table class="text-white mb-5">
            <th>User ID</th>
            <th>Race Name</th>
            <th>Laptime</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($raceResults as $raceResult)
                <tr>
                    <td style="width: 15%">{{ $raceResult->result->user_id }}</td>
                    <td style="width: 50%">{{ $raceResult->race->racename }}</td>
                    <td style="width: 10%">{{ $raceResult->result->laptime }}</td>
                    <td style="width: 10%"><a href="{{ route('results.edit', $raceResult->result->id) }}"
                            class="btn btn-primary">Edit</a>
                    </td>
                    <form action="{{ route('results.destroy', $raceResult->result->id) }}" method="post"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td style="width: 15%"><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this result?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
