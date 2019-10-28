<li class="list-group-item container">
    <div class="row">
        <div class="col-sm-2">
            <img src="{{$project->project_picture}}" alt="{{$project->name}}" class="img-thumbnail img-fluid" />
        </div>
        <div class="col-sm">
            <h5 class="m-0">{{$project->name}}</h5>
            <small>{{$project->pitch}}</small>
        </div>
        <div class="col-sm-3">
            <ul class="float-right navbar-nav">
                <li class="nav-item">
                    <a href="/projects/{{$project->id}}/detail" class="btn btn-primary">{{ __('detail') }}</a>
                    <a href="#" class="btn btn-secondary">{{ __('edit') }}</a>
                    <a href="#" class="btn btn-danger">{{ __('leave') }}</a>
                </li>
            </ul>
        </div>
    </div>
</li>
