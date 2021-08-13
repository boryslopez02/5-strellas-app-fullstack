@extends('layouts.app')

@section('title', 'Negocio 5 Estrellas')

@section('content')
    <!-- Navbar -->
    @include('includes.nav')

    <!-- Obtain reviews -->
    <obtain-reviews-component></obtain-reviews-component>

    <!-- About -->
    <about-component></about-component>

    <!-- Earn Clients -->
    <clients-component></clients-component>

    <!-- Our Plans -->
    <plans-component></plans-component>

    <!-- Individual Plans -->
    <individual-plans-component></individual-plans-component>

    <!-- How Works -->
    <how-works-component></how-works-component>

    <!-- Earn Money -->
    <earn-money-component></earn-money-component>

    <!-- Footer -->
    <footer-component></footer-component>
@endsection