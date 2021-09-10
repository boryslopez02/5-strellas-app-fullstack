@extends('layouts.app')

@section('title', 'Tienda - Negocio 5 Estrellas')

@section('content')
    <!-- Navbar -->
    @include('includes.nav')

    <span class="glass"></span>
    
    <div class="shop container py-5">
        <h1 class="text-center my-5">Comprar Reseñas Google</h1>
        <p class="lead">Obtén reseñas de Google My Business cada mes, mejora progresivamente la puntuación y la reputación de tu empresa con total control sobre las opiniones. <a href="{{ route('faqs') }}">Más info...</a></p>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <table class="table table-responsive-md my-5">
                    <thead class="text-center text-nowrap">
                        <tr>
                            <th scope="col" class="border">Personalización</th>
                            <th scope="col" class="border">
                                <img src="/img/icons/store/star.png" class="d-block img-fluid mx-auto">
                                <p class="lead d-block my-1">Valoración</p>
                            </th>
                            <th scope="col" class="border">
                                <img src="/img/icons/store/pencil.png" class="d-block img-fluid mx-auto">
                                <p class="lead d-block m-0">Texto</p>
                            </th>
                            <th scope="col" class="border">
                                <img src="/img/icons/store/calendar.png" class="d-block img-fluid mx-auto">
                                <p class="lead d-block m-0">Fecha</p>
                            </th>
                            <th scope="col" class="border">
                                <img src="/img/icons/store/flag.jpg" class="d-block img-fluid mx-auto">
                                <p class="lead d-block m-0">País</p>
                            </th>
                            <th scope="col" class="border">
                                <img src="/img/icons/store/city.png" class="d-block img-fluid mx-auto">
                                <p class="lead d-block m-0">Ciudad</p>
                            </th>
                            <th scope="col" class="border">
                                <img src="/img/icons/store/gender.png" class="d-block img-fluid mx-auto">
                                <p class="lead d-block m-0">Género</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th></th>
                            <th class="border">
                                <img src="/img/icons/store/check.png" class="d-block img-fluid mx-auto check">
                            </th>
                            <th class="border">
                                <img src="/img/icons/store/check.png" class="d-block img-fluid mx-auto check">
                            </th>
                            <th class="border">
                                <img src="/img/icons/store/check.png" class="d-block img-fluid mx-auto check">
                            </th>
                            <th class="border">
                                <img src="/img/icons/store/check.png" class="d-block img-fluid mx-auto check">
                            </th>
                            <th class="border">
                                <img src="/img/icons/store/check.png" class="d-block img-fluid mx-auto check">
                            </th>
                            <th class="border">
                                <img src="/img/icons/store/check.png" class="d-block img-fluid mx-auto check">
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <store-suscription-component></store-suscription-component>
    
        <store-packs-component></store-packs-component>
    </div>

@endsection