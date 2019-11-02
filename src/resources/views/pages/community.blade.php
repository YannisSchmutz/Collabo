@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <h3>{{ __('projects') }}</h3>
        <form method="POST" action="{{ URL::to('searchProject') }}" class="row mb-2">
            {{ csrf_field() }}
            <div class="col-6 input-group">
                <input type="text" class="form-control" id="projectSearch" name="projectSearch" placeholder="{{ __('community.project_search') }}">
                <div class="input-group-btn">
                    <button type="submit" class="form-control btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul id="projectSearchResults" class="list-group">
            @foreach ($data->getProjects() as $project )
                @component('components/projectListItem', ['project' =>$project])
                @endcomponent
            @endforeach
        </ul>
    </div>
    <div class="justify-content-center mt-3">
        <h3>{{ __('users') }}</h3>
{{--        <ul class="list-group">--}}
{{--            @foreach ($data->getUsers() as $user )--}}
{{--                @component('components/projectListItem', ['project' =>$project])--}}
{{--                @endcomponent--}}
{{--            @endforeach--}}
{{--        </ul>--}}
    </div>
@endsection
