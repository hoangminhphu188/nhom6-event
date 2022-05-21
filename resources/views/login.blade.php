@extends('layouts.base')
@section('body')

<body class="full-screen login">
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="200">
        <div class="container">
            <div class="navbar-translate">
                <div class="navbar-header">
                    <a class="navbar-brand">Campus Event</a>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../assets/img/sections/bruno-abatti.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row" style="margin-left: unset">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <div class="card card-register">
                            <h3 class="card-title">Admin</h3>
                            <form class="register-form" action="{{ route('admin.auth.login') }}" method="post">
                                @csrf
                                <label>Username</label>
                                <input name="username" type="text" class="form-control no-border"
                                    value="{{ old('username') }}" placeholder="Username">

                                <label>Password</label>
                                <input name="password" type="password" class="form-control no-border"
                                    placeholder="Password">
                                <button class="btn btn-danger btn-block btn-round">Login</button>
                            </form>
                            @if ($errors->any())
                            </p>
                            </p>
                            <div class="text-warning text-center">
                                <h6>{{ $errors->first() }}</h6>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="demo-footer text-center">
                    <h6>&copy;<script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="fa fa-heart heart"></i> by {{ env('AUTHORS_NAME') }}</h6>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
