@extends('layouts.app')

@section('title', 'Guía Publicación - Negocio 5 Estrellas')

@section('content')
    <!-- Navbar -->
    @include('includes.nav')

    <guide-component></guide-component>

    <footer-component></footer-component>
@endsection