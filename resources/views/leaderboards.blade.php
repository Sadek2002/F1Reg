<h1>RaceName: {{$race->racename}}</h1>
@foreach($race->results->sortBy('laptime') as $results)
    <h1>Laptime : {{ $results->laptime}}</h1>
    <h1>User ID: {{$results->user_id}}</h1>
    <h1>Username: {{$results->user->name}}</h1>
    <br>
    <hr>
@endforeach
<h1>meow</h1>
@foreach($races as $racess)
    <button ><a href="{{ route('meow',$racess->id) }}" class="btn btn-primary">Edit</a></button>
@endforeach

