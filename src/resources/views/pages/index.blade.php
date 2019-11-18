@extends('layouts.app')

@section('outside')
    <div class="jumbotron text-center">
        <h1>@lang('landingpage.welcome')</h1>
        <p>@lang('landingpage.welcomeText')</p>
        <p>@lang('landingpage.question1')<br>@lang('landingpage.question2')<br>@lang('landingpage.pitch')</p>
        <p>
            <a class="btn btn-dark p-3 pl-4 pr-4" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</a>
            <a class="btn btn-info font-weight-bold ml-3 p-3 pl-4 pr-4" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
        </p>
    </div>

@endsection
