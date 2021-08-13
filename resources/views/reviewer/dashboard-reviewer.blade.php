@section('title', 'Dashboard - Reseñador')

@extends('dashboard-layout.dashboard')

    @section('sidebar-links')
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reviewer.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviewer.account') }}">Mi Cuenta</a>
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
            <a class="nav-link" href="#">Ayuda y Soporte</a>
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
        <h1 class="h2 m-0">Dashboard</h1>
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
        <h4 class="my-3">Mis Perfiles</h4>

        @if(auth()->user()->status === 'blocked')
            <div class="alert alert-danger my-5" role="alert">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="alert-heading">Se ha inhabilitado tu cuenta!</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr class="bg-dark">
                <p>Ponte en contacto con el administrador de la plataforma.</p>
            </div>
        @endif

        <!-- CAROUSEL CARDS -->
        <get-profiles-component></get-profiles-component>

        <!-- TABLA -->
        <h4 class="my-5">Reseñas asignadas</h4>

        <table class="table table-responsive my-5">
            <thead class="text-center text-nowrap">
                <tr>
                    <th scope="col">ID Reseña</th>
                    <th scope="col">Negocio</th>
                    <th scope="col">Estrellas Por Asignar</th>
                    <th scope="col">Pago a Recibir</th>
                    <th scope="col">Fecha Limite</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <th scope="row">001</th>
                    <td>Negocio XXXX</td>
                    <td>*****</td>
                    <td>Pago a Recibir</td>
                    <td>05/04/2021</td>
                    <td>Por Ejecutar</td>
                </tr>
                <tr>
                    <th scope="row">001</th>
                    <td>Negocio XXXX</td>
                    <td>*****</td>
                    <td>Pago a Recibir</td>
                    <td>05/04/2021</td>
                    <td>Por Ejecutar</td>
                </tr>
                <tr>
                    <th scope="row">001</th>
                    <td>Negocio XXXX</td>
                    <td>*****</td>
                    <td>Pago a Recibir</td>
                    <td>05/04/2021</td>
                    <td>Por Ejecutar</td>
                </tr>
            </tbody>
        </table>
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
