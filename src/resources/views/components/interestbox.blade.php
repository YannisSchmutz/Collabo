<div class="jumbotron">
    <h3>{{$slot}}</h3>
    @foreach ($data as $interest)
        <span class="badge badge-info">{{$interest}}</span>
    @endforeach
</div>
