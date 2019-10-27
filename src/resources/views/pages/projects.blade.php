@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <h3>{{ __('myProjects') }}</h3>
        <ul class="list-group">
            @foreach ($data->getOwnedProjects() as $project )
                @component('components/projectListItem', ['project' =>$project])
                @endcomponent
            @endforeach
        </ul>
    </div>
    <div class="justify-content-center mt-3">
        <h3>{{ __('relatedProjects') }}</h3>
        <ul class="list-group">
            @foreach ($data->getRelatedProjects() as $project )
                @component('components/projectListItem', ['project' =>$project])
                @endcomponent
            @endforeach
        </ul>
    </div>
@endsection
