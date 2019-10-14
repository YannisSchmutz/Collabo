<!-- inspired by https://getbootstrap.com/docs/4.0/examples/starter-template/ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">{{config('app.name', 'Collabo')}}</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false">
            <span class="navbar-toggler-icon" />
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/prject">Projekte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/swipe">Swipe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/inbox">Inbox</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
