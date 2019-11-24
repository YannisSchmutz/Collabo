<li class="list-group-item container">
    <div class="row">
        <div class="col-sm-2">
            <img src="{{$projectVM->getProject()->project_picture}}" alt="{{$projectVM->getProject()->name}}" class="img-thumbnail img-fluid" />
        </div>
        <div class="col-sm">
            <h5 class="m-0">{{$projectVM->getProject()->name}}</h5>
            <small>{{$projectVM->getProject()->pitch}}</small>
        </div>
        <div class="col-sm-3">
            <ul class="float-right navbar-nav">
                <li class="nav-item">
                    <a href="{{route('projectsdetails', [app()->getLocale(), 'id' => $projectVM->getProject()->id])}}"><i class="fas fa-eye ml-2 mr-2"></i></a>
                    @if ($projectVM->getIsRemovable())
                        |
                        <a href="{{route('projectunsubscribe', [
                            app()->getLocale(),
                            'id' => $projectVM->getProject()->id,
                            'redirect' => $projectVM->getRedirect()
                         ])}}"><i class="fas fa-trash ml-2 mr-2"></i></a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</li>
