@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>F1 Registration App</h1>
        <p>EDIT</p>
    </div>

    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter your password" id="password"
                        name="password">
                </div>

                <div class="mb-3">
                    <label for="userRole" class="form-label">UserRole:</label>
                    <select class="form-control" id="userRole" name="userRole">
                        <option value="0" {{ $user->userRole == 0 ? 'selected' : '' }}>Normal User</option>
                        <option value="1" {{ $user->userRole == 1 ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
@endsection
