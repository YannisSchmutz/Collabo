@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="{{$data->getPicPath()}}" class="img-thumbnail thumb-post" alt="profile">
            <div class="jumbotron pt-4 mt-4">
                <h3>Personal Pitch</h3>
                <p>{{$data->getPitch()}}</p>
            </div>
            <div class="pb-4 m-auto">
                <button type="button" class="m-auto btn btn-primary">Collab!</button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <h1>{{$data->getFirstname()}} {{$data->getLastname()}}</h1>
                <p>{{$data->getCaption()}}</p>
            </div>
            <div class="jumbotron">
                <h3>My Interests</h3>
                @foreach ($data->getInterests() as $interest)
                    <span class="badge badge-info">{{$interest}}</span>

                @endforeach
            </div>
            <div class="jumbotron">
                <h3>My Projects</h3>
                <ul>
                    @foreach ($data->getProjects() as $project )
                        <li>{{$project}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
