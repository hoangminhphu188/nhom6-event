@extends('layouts.base')
@section('body')

<body>
    <!-- Navbar -->
    @include('layouts.user.navbar')
    <div class="page-header page-header-small"
        style="background-image: url('{{ asset('assets') }}/img/sections/ptit.png');">
        <div class="filter filter-danger"></div>
        <div class="content-center">
            <div class="container">
                <h1>Let see all events below</h1>
                <h3>Hope you can find what you want</h3>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="main">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-12 ml-auto mr-auto text-center">
                            <form role="search" action="{{ route('user.events.search') }}" class="form-inline"
                                style="justify-content: center">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control border-input"
                                        placeholder="or search for something">&nbsp;&nbsp;
                                </div>
                                <button type="submit" class="btn btn-just-icon"><i class="fa fa-search"></i></button>
                            </form>
                            <div class="separator"></div>
                        </div>
                        <div class="row">
                            @foreach ($events as $event)
                            <div class="col-md-6" data-toggle="modal"
                            data-target="#eventInfoModal{{ $event->id }}" style="cursor: pointer">
                                <div class="card card-plain card-blog text-center">
                                    <div class="card-image" style="margin: auto">
                                        <a style="text-align: center">
                                            <img class="img img-raised" src="{{ asset('assets') }}/img/events/images/{{ $event->image }}" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-warning">
                                            {{ date('H:i', strtotime($event->start_date)) }} {{ date('d-m-Y', strtotime($event->start_date)) }}
                                            -
                                            {{ date('H:i', strtotime($event->end_date)) }} {{ date('d-m-Y', strtotime($event->end_date)) }}
                                            <br>
                                            {{ $event->location }}
                                        </h6>
                                        <h3 class="card-title">
                                            <a>{{ $event->name }}</a>
                                        </h3>
                                        <p class="card-description">
                                            {{ $event->description }}
                                        </p>
                                        <br />
                                        <a class="btn btn-warning btn-round" data-toggle="modal"
                                        data-target="#eventInfoModal{{ $event->id }}">See More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if (count($events) <= 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h1 class="title">
                                    <span>No events found</span>
                                </h1>
                                <p class="description">
                                    Sorry, we can't find what you are looking for.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    {!! $events->links() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.user.footer')

    <!-- Modal -->
    @foreach ($events as $event)
    <div class="modal fade" id="eventInfoModal{{ $event->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $event->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="fa fa-person"></i>
                                        Famous Person
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @foreach (json_decode($event->famous_person) as $person)
                                        <span class="label label-default">{{ $person }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <i class="fa fa-burger"></i>
                                        Free Food
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @foreach (json_decode($event->free_food) as $food)
                                        <span class="label label-default">{{ $food }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">

                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>

@endsection
