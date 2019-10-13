<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>{{config('app.name', 'Collabo')}}</title>
    </head>
    <body>
        <header>
            @include('components.navbar')
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer>

        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
