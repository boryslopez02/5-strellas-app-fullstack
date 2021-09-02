@extends('layouts.app')

@section('title', 'FAQS - Negocio 5 Estrellas')

@section('content')
    <!-- Navbar -->
    @include('includes.nav')

    <faqs-component></faqs-component>

    <footer-component></footer-component>
@endsection