<div class="jumbotron">
    <h3>{{$slot}}</h3>
    <ul class="list-group">
        @foreach ($data as $project )
        <li class="list-group-item">{{$project}}</li>
        @endforeach
    </ul>
</div>
