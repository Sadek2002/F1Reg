{{--with count 0 we check if the race variable has any elements, if it does it will execute the for each and show the date else it will give u an option to redirect--}}
@if($race->count()> 0)
    <h1>RaceName: {{$race[0]->racename}}</h1>
    @foreach($race[0]->results->sortBy('laptime') as $results)
        <h1>Laptime : {{ $results->laptime}}</h1>
        <h1>User ID: {{$results->user_id}}</h1>
        <h1>Username: {{$results->user->name}}</h1>
        <br>
        <hr>
    @endforeach

@else
    <h1>Hey the race u tried searching for does not exist.</h1>
    <a href="{{route('leaderboards')}}">Click me to go back to Leaderboards</a>
@endif
