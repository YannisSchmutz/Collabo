@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{ __('welcome') }}</h1>
        <p>{{ __('welcomeText') }}</p>
        <p>
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </p>
    </div>
    <?php echo App::getLocale(); ?>

@endsection
