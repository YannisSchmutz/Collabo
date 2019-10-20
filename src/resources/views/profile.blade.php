@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="/profile.jpg" class="img-thumbnail thumb-post" alt="profile">
            <div class="jumbotron pt-4 mt-4">
                <h3>Personal Pitch</h3>
                <p>I am an awesome person! I love Blockchains, serverless computing and all other Buzzwordy Stuff!</p>
            </div>
            <div class="pb-4 m-auto">
                <button type="button" class="m-auto btn btn-primary">Collab!</button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <h1>Melanie Müller</h1>
                <p>Cyber Enthusiast | Blockchain Engineer</p>
            </div>
            <div class="jumbotron">
                <h3>My Interests</h3>
                <span class="badge badge-info">Security</span>
                <span class="badge badge-info">Blockchain</span>
                <span class="badge badge-info">Python</span>
            </div>
            <div class="jumbotron">
                <h3>My Projects</h3>
                <ul>
                    <li>Proj 1</li>
                    <li>Proj 2</li>
                </ul>
            </div>
        </div>
    </div>


</div>
@endsection
