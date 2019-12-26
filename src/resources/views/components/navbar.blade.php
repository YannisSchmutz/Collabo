<!-- inspired by https://getbootstrap.com/docs/4.0/examples/starter-template/ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">{{config('app.name', 'Collabo')}}</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="row collapse navbar-collapse" id="nav">
            <div class="col-lg">
            <ul class="navbar-nav mr-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile', app()->getLocale()) }}">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects', app()->getLocale()) }}">{{ __('Projects') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('community', app()->getLocale()) }}">{{ __('Community') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inbox', app()->getLocale()) }}">{{ __('Inbox') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
            <div class="col-sm">
                <ul class="navbar-nav border-left float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main', ['language' => 'en']) }}">{{ __('EN') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main', ['language' => 'de']) }}">{{ __('DE') }}</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
