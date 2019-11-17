@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <h3>{{ __('projecttext.my_projects') }}</h3>
        <ul class="list-group">
            @foreach ($data->getOwnedProjects() as $projectVm)
                @component('components/projectListItem',['projectVM' => $projectVm])
                @endcomponent
            @endforeach
        </ul>

        <div class="card">
            <div class="card-body">
                <form action="{{route('createProject', app()->getLocale())}}" method="get" id="captionForm">
                    @csrf
                    <button type="submit" class="btn btn-primary">@lang('projecttext.create_new_project')</button>
                </form>
            </div>
        </div>
    </div>


    <div class="justify-content-center mt-3">
        <h3>{{ __('projecttext.related_projects') }}</h3>
        <ul class="list-group">
            @foreach ($data->getRelatedProjects() as $projectVm )
                @component('components/projectListItem',['projectVM' => $projectVm])
                @endcomponent
            @endforeach
        </ul>
    </div>
@endsection
