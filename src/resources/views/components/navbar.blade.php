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
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects') }}">{{ __('Projects') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('swipe') }}">{{ __('Swipe') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('community') }}">{{ __('Community') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inbox') }}">{{ __('Inbox') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}">{{ __('Settings') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
            <div class="col-sm">
                <ul class="navbar-nav border-left float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome', ['locale' => 'en']) }}">{{ __('EN') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome', ['locale' => 'DE']) }}">{{ __('DE') }}</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
