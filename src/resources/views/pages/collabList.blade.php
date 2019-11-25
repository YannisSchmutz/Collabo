@extends('layouts.app')

@section('content')
    @foreach ($data as $project)
        <li class="list-group-item container">
            <div class="row">
                <div class="col-sm-2">
                    <img src="{{$project->getProject()->project_picture}}" alt="Projektbild" class="img-thumbnail img-fluid" />
                </div>
                    <div class="col-sm">
                        <h5 class="m-0">{{$project->getProject()->name}}</h5>
                        <small>{{$project->getProject()->pitch}}</small>
                    </div>
                    <a href="{{route('p2ucollab_selected', [app()->getLocale(), 'userid' => $userid, 'projectid' => $project->getProject()->id])}}" role="button" class="btn btn-primary mr-2 p-4 text-center"><br><i class="far fa-check-circle "></i></a>
            </div>
        </li>

    @endforeach
    @if(count($data) <= 0)
    <h1>{{__('collabList_text.no_projects')}}</h1>
    @endif

@endsection
