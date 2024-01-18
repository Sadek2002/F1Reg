@extends('bootstrap.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container.mt-4 {
            margin: 0 32.5% 0 32.5%;
        }

        form {
            width: 35%;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="mt-4 p-5  text-white rounded">
        <h1>F1 Registration App | User page</h1>
    </div>

    <div class="container mt-4">
        <div>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-white">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter your name" id="name"
                        name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter your email" id="email"
                        name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-white">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter your password" id="password"
                        name="password">
                </div>

                <div class="mb-3">
                    <label for="userRole" class="form-label text-white">User Role:</label>
                    <select class="form-control" id="userRole" name="userRole">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Create User</button>
            </form>
        </div>
    </div>
</body>

</html>
