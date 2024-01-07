@extends('adminlte::page')
@section('title', 'Materia')

@section('content_header')
    <h1 class="text-2xl font-bold text-center">Materias</h1>
    <p class="text-center">#EstamosParaRecomendarte</p>
@stop
@section('content')
    @foreach ($materia as $m)
        @if ($m->semestre_id == 1)
            <div class="py-2 px-18">
                <div class="py-1">
                    <div
                        class="bg-red-500 overflow-hidden shadow-lg rounded-lg p-4 h-auto max-w-3xl mx-auto sm:px-6 lg:px-8">
                        <div class="text-gray-900 overflow-auto">
                            <!-- Contenido de tu div aquí -->
                            <h1 class="text-2xl font-bold mb-1 text-white">{{ $m->nombre }}</h1>
                            <p class="text-white">Sigla: {{ $m->sigla }}</p>
                            <p class="text-white">Semestre: {{ $m->semestre->nombre }} Semestre</p>
                        </div>
                        <div class="mt-3">

                            <a href="{{ route('primersemestre.materia', ['id' => $m->id]) }}"
                                class="text-black  bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:ring-gray-300 font-bold rounded-lg text-sm px-5 py-2.5 dark:bg-gray-300 dark:hover:bg-gray-400 focus:outline-none dark:focus:ring-gray-400">Ver
                                Recomendaciones →</a>
                            <a href="{{ route('primersemestre.materiaedit', ['id' => $m->id]) }}"
                                class="text-black  bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:ring-gray-300 font-bold rounded-lg text-sm px-5 py-2.5 dark:bg-gray-300 dark:hover:bg-gray-400 focus:outline-none dark:focus:ring-gray-400">Recomendar→</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
