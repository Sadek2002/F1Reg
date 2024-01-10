@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>F1 Registration App</h1>
        <p>CREATE</p>
    </div>

    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="{{ route('results.store') }}">
                @csrf

                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                <div class="mb-3">
                    <label for="laptime" class="form-label">Laptime:</label>
                    <input type="text" class="form-control" placeholder="Enter laptime" id="laptime" name="laptime">
                </div>
                <button type="submit" class="btn btn-primary">Create Result</button>
            </form>
        </div>
    </div>
@endsection
