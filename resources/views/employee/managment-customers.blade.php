@section('title', 'Dashboard - Gestión de Clientes')

@extends('dashboard-layout.dashboard')

    @section('sidebar-links')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.account') }}">Mi Cuenta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.managment-stories') }}">Gestión de Reseñas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.managment-payments') }}">Gestión de Pagos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('employee.managment-customers') }}">Gestión de Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.managment-reviewers') }}">Gestión de Reseñadores</a>
        </li>
        <li class="nav-item mb-md-5 mt-md-auto">
            <a class="nav-link" href="{{ route('employee.help') }}">Ayuda y Soporte</a>
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
        <h1 class="h2 m-0">Gestión de Clientes</h1>

        <div class="btn-toolbar my-3 d-none d-md-block">
            <div class="btn-group">
                <a href="#" class="btn text-nowrap">Redes Sociales</a>
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
        
        <!-- TABLA -->
        <h4 class="my-5">Clientes</h4>

        <table class="table table-responsive my-5">
            <thead class="text-center text-nowrap">
                <tr>
                    <th scope="col">ID Reseña</th>
                    <th scope="col">Usuario asignado</th>
                    <th scope="col">Email Local Guide</th>
                    <th scope="col">Email Contacto</th>
                    <th scope="col">País</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <th scope="row">001</th>
                    <td>Nombre 1</td>
                    <td>mail@mail.com</td>
                    <td>mail@mail.com</td>
                    <td>País</td>
                    <td>Estatus</td>
                    <td>Estatus</td>
                </tr>
                <tr>
                    <th scope="row">001</th>
                    <td>Nombre 1</td>
                    <td>mail@mail.com</td>
                    <td>mail@mail.com</td>
                    <td>País</td>
                    <td>Estatus</td>
                    <td>Estatus</td>
                </tr>
                <tr>
                    <th scope="row">001</th>
                    <td>Nombre 1</td>
                    <td>mail@mail.com</td>
                    <td>mail@mail.com</td>
                    <td>País</td>
                    <td>Estatus</td>
                    <td>Estatus</td>
                </tr>
            </tbody>
        </table>
        <!-- END TABLE -->
  
    @endsection
    
    @section('right-content')
        <div class="gallet">
            <b>Notificaciones</b>
        </div>
        
        <div class="gallet">
            <hr>
            <p class="lead">15 Nuevos Reseñadores</p>
            <hr>
            <p class="lead">25 Nuevos Clientes</p>
            <hr>
            <p class="lead">10 Solicitudes de Pago</p>
            <hr>
            <p class="lead">Se aproxima fecha de pago a reseñadores</p>
            <hr>
        </div>
    @endsection