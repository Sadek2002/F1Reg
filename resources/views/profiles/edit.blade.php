@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>F1 Registration App</h1>
        <p>UPDATE</p>
    </div>

    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('profiles.update', $profile->id)}}" method="POST">
                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname:</label>
                    <input type="text" class="form-control" value="{{ $profile->firstname }}" id="firstname" name="firstname">
                </div>
                
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname:</label>
                    <input type="text" class="form-control" value="{{ $profile->lastname }}" id="lastname" name="lastname">
                </div>
                
                <button type="submit" class="btn btn-primary">Edit Profile</button>
            </form>
        </div>
    </div>
@endsection
