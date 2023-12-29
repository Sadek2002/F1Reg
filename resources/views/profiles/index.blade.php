@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-info text-white rounded">
        <h1>F1 Registration App</h1>
        <p>INDEX</p>
        <a href="{{ route('profiles.create') }}" class="btn btn-sm btn-outline-primary">Create Profile</a>
    </div>

    <div class="container">
        <table class="table">
            <th>User ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->user_id }}</td>
                    <td>{{ $profile->firstname }}</td>
                    <td>{{ $profile->lastname }}</td>
                    <td><a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">Edit</a></td>
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
