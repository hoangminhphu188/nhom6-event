<nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="200">
    <div class="container">
        <div class="navbar-translate">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">PTIT Campus Event</a>
            </div>
            <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
                <span class="navbar-toggler-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" data-scroll="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.events.index') }}" data-scroll="true">Event List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.about.index') }}" data-scroll="true">About Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
