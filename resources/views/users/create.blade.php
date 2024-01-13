@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>F1 Registration App</h1>
        <p>CREATE</p>
    </div>

    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter your email" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter your password" id="password"
                        name="password">
                </div>

                <div class="mb-3">
                    <label for="userRole" class="form-label">User Role:</label>
                    <select class="form-control" id="userRole" name="userRole">
                        <option value="0">Normal User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>
@endsection
