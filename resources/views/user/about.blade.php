@extends('layouts.base')
@section('body')
<body>
    <!-- Navbar -->
    @include('layouts.user.navbar')
    <div class="page-header page-header-small" style="background-image: url('{{ asset('assets') }}/img/sections/rawpixel-comm.jpg');">
        <div class="filter filter-danger"></div>
        <div class="content-center">
            <div class="container">
                <h1>About Us</h1>
                <h3>Let us tell you more about what we do.</h3>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="main">
            <div class="section section-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    {{-- <span class="category-social text-info pull-right">
                                        <i class="fa fa-twitter"></i>
                                    </span> --}}
                                    <div class="clearfix"></div>
                                    <div class="author">
                                        <a>
                                           <img src="{{ asset('assets') }}/img/faces/kaci-baum-2.jpg" alt="..." class="avatar-big img-raised border-gray">
                                        </a>
                                        <h5 class="card-title">Hoàng Minh Phú</h5>
                                        <p class="category"><a class="text-danger">B19DCVT284</a></p>
                                    </div>
                                    <p class="card-description">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    {{-- <span class="category-social text-info pull-right">
                                        <i class="fa fa-twitter"></i>
                                    </span> --}}
                                    <div class="clearfix"></div>
                                    <div class="author">
                                        <a>
                                           <img src="{{ asset('assets') }}/img/faces/kaci-baum-2.jpg" alt="..." class="avatar-big img-raised border-gray">
                                        </a>
                                        <h5 class="card-title">Trần Huy Tuấn</h5>
                                        <p class="category"><a class="text-danger">B19DCVT346</a></p>
                                    </div>
                                    <p class="card-description">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    {{-- <span class="category-social text-info pull-right">
                                        <i class="fa fa-twitter"></i>
                                    </span> --}}
                                    <div class="clearfix"></div>
                                    <div class="author">
                                        <a>
                                           <img src="{{ asset('assets') }}/img/faces/kaci-baum-2.jpg" alt="..." class="avatar-big img-raised border-gray">
                                        </a>
                                        <h5 class="card-title">Nguyễn Văn Lượng</h5>
                                        <p class="category"><a class="text-danger">B19DCVT244</a></p>
                                    </div>
                                    <p class="card-description">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    {{-- <span class="category-social text-info pull-right">
                                        <i class="fa fa-twitter"></i>
                                    </span> --}}
                                    <div class="clearfix"></div>
                                    <div class="author">
                                        <a>
                                           <img src="{{ asset('assets') }}/img/faces/kaci-baum-2.jpg" alt="..." class="avatar-big img-raised border-gray">
                                        </a>
                                        <h5 class="card-title">Đào Văn Thanh </h5>
                                        <p class="category"><a class="text-danger">B19DCVT370</a></p>
                                    </div>
                                    <p class="card-description">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    {{-- <span class="category-social text-info pull-right">
                                        <i class="fa fa-twitter"></i>
                                    </span> --}}
                                    <div class="clearfix"></div>
                                    <div class="author">
                                        <a>
                                           <img src="{{ asset('assets') }}/img/faces/kaci-baum-2.jpg" alt="..." class="avatar-big img-raised border-gray">
                                        </a>
                                        <h5 class="card-title">Trần Minh Đức</h5>
                                        <p class="category"><a class="text-danger">B19DCVT104</a></p>
                                    </div>
                                    <p class="card-description">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.user.footer')
</body>

@endsection
