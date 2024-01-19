@extends('bootstrap.app')

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>

<body class="background-image">
@include('layouts.header');
<table class="text-white mb-5" width="70%">
    <th>Name</th>
    <th>View Profile</th>
    @foreach ($users as $user)
        <tr>
            <td style="width: 30%">{{ $user->name }}</td>
            <td style="width: 10%"><a href="{{ route('users.show', $user->id) }}"
                    class="btn btn-primary">View Profile</a></td>
        </tr>
    @endforeach
</table>
</body>

</html>