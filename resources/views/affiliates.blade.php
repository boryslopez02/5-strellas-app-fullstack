@extends('layouts.app')

@section('title', 'Afiliados - Negocio 5 Estrellas')

@section('content')
    <!-- Navbar -->
    @include('includes.nav')

    <affiliates-component></affiliates-component>

    <footer-component></footer-component>
@endsection