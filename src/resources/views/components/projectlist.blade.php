<div class="card mt-4 mb-4 p-2">
    <h3 class="card-title">{{$slot}}</h3>
    <div class="card-body">
        <ul class="list-group">
            @foreach ($data as $project )
            <li class="list-group-item">{{$project}}</li>
            @endforeach
        </ul>
    </div>
</div>
