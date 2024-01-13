<div>
    <form method="GET" action="{{ route('racescore') }}">
        <label>
            <input type="text" name="search" placeholder="Find Race">
        </label>
    </form>
</div>
{{--We accses the race table and display the name of the race. --}}
{{--And in our for each we go into the result table and display the data in there.--}}
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
    <button><a href="{{ route('leaderboard',$racess->id) }}" class="btn btn-primary">{{$racess->racename}}</a></button>
@endforeach

