@section('title', 'Dashboard - Administrador - Suscripciones')

@extends('dashboard-layout.dashboard')

    @section('sidebar-links')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users') }}">Gestión de usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Gestión de Pagos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.suscriptions') }}">Gestión de suscripciones y packs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Gestión de Herramientas SEO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.offers') }}">Gestión de Ofertas y Promociones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Configuración de Redes Sociales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Reportes</a>
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
        <h1 class="h2 m-0">Dashboard</h1>
        <div class="btn-toolbar my-3 d-none d-md-block">
            <div class="btn-group">
                <a href="" class="btn text-nowrap">Redes Sociales</a>
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
        <!-- TABLE -->
        
        <div class="suscriptions">
            <add-suscriptions-component></add-suscriptions-component>
            <add-packs-component></add-packs-component>
        </div>

        <!-- END TABLE -->
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
