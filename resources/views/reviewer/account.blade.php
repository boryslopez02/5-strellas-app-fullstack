@section('title', 'Dashboard - Mi Cuenta')

@extends('dashboard-layout.dashboard')

    @section('sidebar-links')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviewer.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reviewer.account') }}">Mi Cuenta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviewer.profile') }}">Mis Perfiles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Herramientas SEO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviewer.store') }}">Mi Tienda</a>
        </li>
        <li class="nav-item mb-md-5 mt-md-auto">
            <a class="nav-link" href="{{ route('reviewer.help') }}">Ayuda y Soporte</a>
        </li>
    @endsection

    @section('sidebar-links2')
        <li class="nav-item">
            <hr>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Redes Sociales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Referidos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.querySelector('form.logout-form').submit();">
                {{ __('Salir') }}
            </a>

            <form action="{{ route('logout') }}" method="POST" class="d-none logout-form">
                @csrf
            </form>
        </li>
    @endsection

    @section('nav-content')
        <h1 class="h2 m-0">Mi Cuenta</h1>
        <div class="btn-toolbar my-3 d-none d-md-block">
            <div class="btn-group">
                <a href="" class="btn text-nowrap">Redes Sociales</a>
                <a href="" class="btn text-nowrap">Referidos</a>
                <a class="btn text-nowrap" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.querySelector('form.logout-form').submit();">
                    {{ __('Salir') }}
                </a>

                <form action="{{ route('logout') }}" method="POST" class="d-none logout-form">
                    @csrf
                </form>
            </div>
        </div>
    @endsection
   
    @section('center-content')
        <h4 class="mt-3 mb-5">Actualización de Cuenta</h4>

        <!-- FORM ACCOUNT -->
        <create-account-component></create-account-component>
        <!-- END FORM ACCOUNT -->
        
    @endsection

    @section('right-content')
        <div class="gallet">
            <b>Mi Billetera:</b>
            <h1>$72</h1>
        </div>
        
        <div class="gallet">
            <hr>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia aperiam aut commodi minus alias, possimus dicta, quos error animi est quia sint praesentium repudiandae perferendis magnam ut accusamus tempore. Fugiat!</p>
            <hr>
        </div>
        
        <div class="gallet">
            <b>Descuento</b>
            <h1>10%</h1>
        </div>
    @endsection