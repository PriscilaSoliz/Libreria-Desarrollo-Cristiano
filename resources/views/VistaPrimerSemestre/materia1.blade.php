@extends('adminlte::page')
@section('title', 'Materia')

@section('content_header')

@if(isset($materia))
    <h1 class="text-2xl font-bold text-center">{{ $materia->nombre }}</h1>
    <p class="text-center">#EstamosParaRecomendarte</p>
@endif

@stop
@section('content')

<h2 class="mb-2 text-lg font-semibold text-red dark:text-red">DOCENTES</h2>
@foreach ($docentemateria as $dm)
    @if (isset($materia) && $materia->id == $dm->materia->id)
        <ul class="max-w-md space-y-1 text-black list-disc list-inside dark:text-black">
            <li>
                {{$dm->docente->nombre}}
            </li>
        </ul>
    @endif
@endforeach


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
