@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-info text-white rounded">
        <h1>F1 Registration App</h1>
        <p>INDEX</p>
        <a href="{{ route('results.create') }}" class="btn btn-sm btn-outline-primary">Create Result</a>
    </div>

    <div class="container">
        <table class="table">
            <th>User ID</th>
            <th>Race Name</th>
            <th>Laptime</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($raceResults as $raceResult)
                <tr>
                    <td>{{ $raceResult->result->user_id }}</td>
                    <td>{{ $raceResult->race->racename }}</td>
                    <td>{{ $raceResult->result->laptime }}</td>
                    <td><a href="{{ route('results.edit', $raceResult->result->id) }}" class="btn btn-primary">Edit</a></td>
                    <form action="{{ route('results.destroy', $raceResult->result->id) }}" method="post"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this result?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
