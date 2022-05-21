@extends('layouts.base')
@section('body')

<body class="full-screen register">
    <!-- Navbar -->
    @include('layouts.user.navbar')

    <div class="wrapper">
        <div class="page-header" style="background-image: url('{{ asset('assets') }}/img/sections/tttt.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="title">
                                <span>SỰ KIỆN PTIT</span>
                            </h1>
                            <p class="description">
                                CHÀO MỪNG BẠN ĐẾN VỚI TRANG THÔNG TIN SỰ KIỆN TẠI PTIT!
                            </p>
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
