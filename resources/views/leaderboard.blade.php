<h1>RaceName: {{$race->racename}}</h1>
{{--@foreach ($races as $race)--}}
{{--    {{$race->racename}}--}}
{{-- @endforeach--}}
{{--@foreach ($results as $result)--}}
{{--    {{$result->laptime}}--}}
{{--@endforeach--}}

@foreach($race->results->sortByDesc('laptime') as $results)
    <h1>Laptime : {{ $results->laptime}}</h1>
    <h1>User ID: {{$results->user_id}}</h1>
    <h1>Username: {{$results->user->name}}</h1>
    <br>
    <hr>
@endforeach

