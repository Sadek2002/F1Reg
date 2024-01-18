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
        <h1>F1 Registration App | User page</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-light">Create User</a>
    </div>

    <div class="container">
        <table class="text-white mb-5" width="70%">
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($users as $user)
                <tr>
                    <td style="width: 10%">{{ $user->id }}</td>
                    <td style="width: 30%">{{ $user->name }}</td>
                    <td style="width: 40%">{{ $user->email }}</td>
                    <td style="width: 10%"><a href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-primary">Edit</a></td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td style="width: 10%"><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
