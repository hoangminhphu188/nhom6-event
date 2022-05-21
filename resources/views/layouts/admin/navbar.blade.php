<nav class="navbar navbar-expand-lg fixed-top bg-danger nav-down">
    <div class="container">
        <div class="navbar-translate">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.events.index') }}">Admin | Campus Event</a>
            </div>
            <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse"
                data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-round btn-danger" href="{{ route('home') }}">
                        User Page
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-round btn-danger" href="{{ route('admin.auth.logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
