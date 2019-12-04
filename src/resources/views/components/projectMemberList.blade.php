<form action="{{$routeName}}" method="post" id="permissionsForm" class="card mt-4 mb-4 p-2">
    @csrf
    <h3 class="card-title">@lang('profiletext.members')</h3>
    <ul class="form-group p-0">
        @foreach($members as $profile)
            <li class="list-group-item container">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="{{$profile->profile_picture}}" alt="{{$profile->name}}" class="img-thumbnail img-fluid" />
                    </div>
                    <div class="col-sm">
                        <h5 class="m-0">{{$profile->name}}</h5>
                        <div class="row form-group mt-4 mb-0 ml-0 mr-0">
                            <label for="{{$profile->id}}" class="control-label">
                                @lang('profiletext.permission'):
                            </label>
                            <select name="{{$profile->id}}" class="form-control">
                                @foreach($permissions as $permission)
                                    <option
                                        value="{{$permission}}"
                                        @if($permission == $profile->pivot->permission) selected="selected" @endif>
                                        @lang('profiletext.'.$permission)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <ul class="float-right navbar-nav">
                            <li class="nav-item">
                                <a href="/profile/{{$profile->id}}/detail"><i class="fas fa-eye ml-2 mr-2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <button type="submit" class="btn btn-primary col-sm-2">@lang('general.submit')</button>
</form>
