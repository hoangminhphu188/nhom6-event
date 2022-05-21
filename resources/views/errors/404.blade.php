@extends('layouts.base')
@section('body')

    <body>
        <div class="container pt-5 mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>Oops!</h1>
                        <h2>404 Not Found</h2>
                        <div class="error-details">
                            Sorry, an error has occurred, Requested page not found!
                        </div>
                        <div class="error-actions">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                                Take Me Home
                            </a>
                            <a href="https://www.facebook.com/klpod221/" class="btn btn-default btn-lg"> Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
