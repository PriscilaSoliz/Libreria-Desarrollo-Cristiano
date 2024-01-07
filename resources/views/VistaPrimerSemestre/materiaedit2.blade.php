@extends('adminlte::page')
@section('title', 'Materia')

@section('content_header')

@if(isset($materia))
    <h1 class="text-2xl font-bold text-center">{{ $materia->nombre }}</h1>
    <p class="text-center">#EstamosParaRecomendarte editar 2</p>
@endif

@stop
@section('content')

<h2 class="mb-2 text-lg font-semibold text-red dark:text-red">DOCENTES edit</h2>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
