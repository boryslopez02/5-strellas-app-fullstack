@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="glass-light">

        <nav class="navbar navbar-light sticky-top px-2 d-md-none">
            <a class="navbar-brand mr-0 px-3" href="/">
                <img src="{{ asset('img/logo.png') }}" class="img-fluid">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pb-3 position-fixed">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item d-none d-md-block">
                                <a href="/" c7lass="navbar-brand">
                                    <img src="{{ asset('img/logo.png') }}" class="img-fluid">
                                </a>
                            </li>
                            @yield('sidebar-links')
                        </ul>
                        <ul class="nav flex-column d-md-none">
                            @yield('sidebar-links2')
                        </ul>
                    </div>
                </nav>

                <div class="main-content col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3">
                        @yield('nav-content')
                    </div>

                    <div class="row m-0 p-0">
                        <div class="col-12 col-lg-8 col-xl-9 order-2 order-md-1">
                            @yield('center-content')
                        </div>

                        <div class="col-12 col-lg-4 col-xl-3 order-1 order-md-2">
                            @yield('right-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection