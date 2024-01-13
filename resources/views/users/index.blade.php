@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-info text-white rounded">
        <h1>F1 Registration App</h1>
        <p>INDEX</p>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">Create User</a>
    </div>

    <div class="container">
        <table class="table">
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a></td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
