<h1>RaceName: {{$allRaces->racename}}</h1>
@foreach($allRaces->results->sortBy('laptime') as $results)
    <h1>Laptime : {{ $results->laptime}}</h1>
    <h1>User ID: {{$results->user_id}}</h1>
    <h1>Username: {{$results->user->name}}</h1>
    <br>
    <hr>
@endforeach
