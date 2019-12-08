<li class="list-group-item container">
    <div class="row">
        <div class="col-sm-2">
            <img src="{{$profile->profile_picture}}" alt="{{$profile->name}}" class="img-thumbnail img-fluid" />
        </div>
        <div class="col-sm">
            <h5 class="m-0">{{$profile->name}}</h5>
            <small>{{$profile->pitch}}</small>
        </div>
        <div class="col-sm-3">
            <ul class="float-right navbar-nav">
                <li class="nav-item">
                    <a href="{{route('profiledetails', [app()->getLocale(), 'id' => $profile->id])}}"><i class="fas fa-eye ml-2 mr-2"></i></a>
                </li>
            </ul>
        </div>
    </div>
</li>
