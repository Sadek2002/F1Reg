@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <h1>F1 Registration App | User page</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-light">Create User</a>
    </div>

    <div class="container">
        <table class="text-white mb-5">
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            @foreach ($users as $user)
                <tr>
                    <td style="width: 25%">{{ $user->id }}</td>
                    <td style="width: 20%">{{ $user->name }}</td>
                    <td style="width: 20%">{{ $user->email }}</td>
                    <td style="width: 15%"><a href="{{ route('users.edit', $user->id) }}"
                            class="btn btn-primary">Edit</a></td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <td style="width: 20%"><button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
