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
        <header id="top">
            @include('components.navbar')
        </header>
        <main role="main" class="container">
                @yield('content')
        </main>
        <footer class="text-muted text-light bg-dark align-baseline">
            <div class="container">
                <div class="row">
                    <p class="col-6">&copy; by {{config('app.name', 'Collabo')}}</p>
                    <p class="col-6">
                        <a href="#top" class="float-right">Zurück nach oben</a>
                    </p>
                </div>
            </div>
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
