<div class="card mt-4 mb-4 p-2">
    <h3 class="card-title">{{$slot}}</h3>
    <div class="card-body">
        @foreach ($data as $interest)
            <span class="badge badge-info">{{$interest}}</span>
        @endforeach
    </div>
</div>
