@extends('layouts.app')

@section('title', 'Tienda - Negocio 5 Estrellas')

@section('content')
    <!-- Navbar -->
    @include('includes.nav')

    <span class="glass"></span>
    
    <div class="container py-5">
        <store-suscription-component></store-suscription-component>
    
        <store-packs-component></store-packs-component>
    </div>

@endsection