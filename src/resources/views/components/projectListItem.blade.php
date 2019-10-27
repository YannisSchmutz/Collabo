<li class="list-group-item container">
    <div class="row">
        <div class="col-sm-2">
            <img src="/profile.jpg" alt="{{$project->name}}" class="img-thumbnail img-fluid" />
        </div>
        <div class="col-sm">
            <h5 class="m-0">{{$project->name}}</h5>
            <small>{{$project->pitch}}</small>
        </div>
        <div class="col-sm-2">
            <ul class="float-right navbar-nav">
                <li class="nav-item">
                    <a href="#" class="btn btn-primary">{{ __('edit') }}</a>
                    <a href="#" class="btn btn-danger">{{ __('leave') }}</a>
                </li>
            </ul>
        </div>
    </div>
</li>
