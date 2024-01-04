@extends('adminlte::page')
@section('title', 'Materia')

@section('content_header')
    <h1 class="text-2xl font-bold text-center">Materias</h1>
     <p class="text-center">#EstamosParaRecomendarte</p>
@stop
@section('content')
<div class="py-2 px-18">
    <div class="py-1">
        <div class="bg-red-500 overflow-hidden shadow-lg rounded-lg p-4 h-auto max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-900 overflow-auto">
                <!-- Contenido de tu div aquí -->
                <h1 class="text-2xl font-bold mb-1 text-white">Introduccion a la Informatica</h1>
                <p class="text-white">Sigla: INF110 </p>
                <p class="text-white">Semestre: Primer Semestre</p>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
