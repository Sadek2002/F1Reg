{{--We accses the race table and display the name of the race. --}}
{{--And in our for each we go into the result table and display the data in there.--}}
<h1>RaceName: {{$allRaces->racename}}</h1>
@foreach($allRaces->results->sortBy('laptime') as $results)
    <h1>Laptime : {{ $results->laptime}}</h1>
    <h1>User ID: {{$results->user_id}}</h1>
    <h1>Username: {{$results->user->name}}</h1>
    <br>
    <hr>
@endforeach
