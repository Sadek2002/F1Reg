<h1>RaceName: {{$race->racename}}</h1>
@foreach($race->results->sortBy('laptime') as $results)
    <h1>Laptime : {{ $results->laptime}}</h1>
    <h1>User ID: {{$results->user_id}}</h1>
    <h1>Username: {{$results->user->name}}</h1>
    <br>
    <hr>
@endforeach
<h1>All race leaderboards</h1>
@foreach($races as $racess)
    <button ><a href="{{ route('leaderboard',$racess->id) }}" class="btn btn-primary">{{$racess->racename}} {{$racess->created_at}}</a></button>
@endforeach

