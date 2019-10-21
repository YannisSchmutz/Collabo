<div class="jumbotron">
    <h3>{{$slot}}</h3>
    <ul>
        @foreach ($data as $project )
        <li>{{$project}}</li>
        @endforeach
    </ul>
</div>
