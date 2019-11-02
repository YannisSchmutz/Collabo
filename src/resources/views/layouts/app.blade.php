<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Collabo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
    <header id="top">
        @include('components.navbar')
    </header>
    <main role="main" class="container">
        @yield('content')
    </main>
    <footer class="text-muted text-light bg-dark fixed-bottom">
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
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#projectSearch').keyup(function(){
                let searchterm = $('#projectSearch').val();
                if(searchterm.length == 0){
                    $("#projectSearchResults").html("");
                }else{
                    $.get(
                        "{{ URL::to('searchProject') }}",
                        {searchterm:searchterm},
                        function(result){
                            if($('#projectSearch').val() != result.searchterm){ return; }
                            $("#projectSearchResults").empty().html(result.html);
                        }
                    )
                }
            });
        });
    </script>
</body>
</html>
