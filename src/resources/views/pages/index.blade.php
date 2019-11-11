@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{ __('welcome') }}</h1>
        <p>{{ __('welcomeText') }}</p>
        <p>
            <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</a>
            <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
        </p>
    </div>

@endsection
