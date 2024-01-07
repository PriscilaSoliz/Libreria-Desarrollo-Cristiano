@extends('adminlte::page')
@section('title', 'Materia')

@section('content_header')
    @if (isset($materia))
        <h1 class="text-2xl font-bold text-center">{{ $materia->nombre }}</h1>
        <p class="text-center">#EstamosParaRecomendarte</p>
    @endif
@stop
@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
