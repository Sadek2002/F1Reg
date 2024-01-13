@extends('layouts.app')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>F1 Registration App</h1>
        <p>SHOW</p>
    </div>
    <div class="col-8 offset-2">
        <h2>{{ $raceResults->first()->result->user->name . "'s Profile" }} @if ($raceResults->first()->result->user->userRole === 0)
            @else
                <img src="{{ url('images/shield.png') }}" alt="" width="18px">
            @endif
        </h2>
        

        @if ($raceResults->isNotEmpty())
            <img src="" alt="">
            <p>Name: {{ $raceResults->first()->result->user->name }}</p>
            <p>Email: {{ $raceResults->first()->result->user->email }}</p>

            <table>
                <tr>
                    <th>Race name</th>
                    <th>Score</th>
                </tr>
                @foreach ($raceResults as $raceResult)
                    <tr>
                        <td>{{ $raceResult->race->racename }}</td>
                        <td>{{ $raceResult->result->laptime }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>No race results available for this user.</p>
        @endif
    </div>
@endsection
