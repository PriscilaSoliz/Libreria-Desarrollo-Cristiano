@extends('adminlte::page')
@section('title', 'Materia')

@section('content_header')

    @if (isset($materia))
        <h1 class="text-2xl font-bold text-center">Docentes | {{ $materia->nombre }}</h1>
        <p class="text-center">#EstamosParaRecomendarte</p>
    @endif

@stop
@section('content')

    <!-- resources/views/comments/index.blade.php -->

    @foreach ($docentemateria as $dm)
        @if (isset($materia) && $materia->id == $dm->materia->id)
            <h2 class="mb-2 text-lg font-semibold text-black dark:text-red">{{ $dm->docente->nombre }}</h2>
            <h2 class="mb-2 text-lg font-semibold text-red dark:text-red">Enseñanza</h3>
                <div class="flex space-x-4">
                    <div class="flex items-center mb-2">
                        <input id="enseñanza_option1" type="radio" name="enseñanza_options" value="option1"
                            class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-offset-gray-100 focus:ring-2">
                        <label for="enseñanza_option1" class="ms-2 text-sm font-medium text-gray-900">Excelente</label>
                    </div>

                    <div class="flex items-center">
                        <input id="enseñanza_option2" type="radio" name="enseñanza_options" value="option2"
                            class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-offset-gray-100 focus:ring-2">
                        <label for="enseñanza_option2" class="ms-2 text-sm font-medium text-gray-900">Bueno</label>
                    </div>

                    <div class="flex items-center">
                        <input id="enseñanza_option3" type="radio" name="enseñanza_options" value="option3"
                            class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-offset-gray-100 focus:ring-2">
                        <label for="enseñanza_option3" class="ms-2 text-sm font-medium text-gray-900">Regular</label>
                    </div>
                </div>

                <h2 class="mb-2 text-lg font-semibold text-red dark:text-red">Dificultad</h3>
                    <div class="flex space-x-4">
                        <div class="flex items-center mb-2">
                            <input id="dificultad_option1" type="radio" name="dificultad_options" value="option1"
                                class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-offset-gray-100 focus:ring-2">
                            <label for="dificultad_option1" class="ms-2 text-sm font-medium text-gray-900">Easy</label>
                        </div>

                        <div class="flex items-center">
                            <input id="dificultad_option2" type="radio" name="dificultad_options" value="option2"
                                class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-offset-gray-100 focus:ring-2">
                            <label for="dificultad_option2" class="ms-2 text-sm font-medium text-gray-900">Moderado</label>
                        </div>

                        <div class="flex items-center">
                            <input id="dificultad_option3" type="radio" name="dificultad_options" value="option3"
                                class="w-4 h-4 text-blue-600 bg-gray-200 border-gray-300 rounded focus:ring-blue-500 focus:ring-offset-gray-100 focus:ring-2">
                            <label for="dificultad_option3"
                                class="ms-2 text-sm font-medium text-gray-900">Hard</label>
                        </div>
                    </div>

                    <button class=" bg-red-500 text-white p-1 rounded-md">
                        Guardar Eleccion
                    </button>
                    <button class="toggleComments bg-gray-400 text-white p-1 rounded-md"
                        data-target="commentsContainer{{ $dm->docente->id }}">
                        Comentar
                    </button>




                    <div id="commentsContainer{{ $dm->docente->id }}" class="container mx-auto my-8 hidden">
                        <h1 class="text-2xl font-bold mb-1">Comentarios</h1>

                        {{-- @foreach ($comments as $comment) --}}
                        <div class="bg-gray-100 p-4 mb-1">
                            <p class="font-semibold">Facil de pasar</p>
                            <p class="font-semibold">Enseña regular pero se aprende</p>
                        </div>
                        {{-- @endforeach --}}

                        <form action="·" method="post" class="mb-8">
                            @csrf
                            <label for="content" class="block mb-2">Comentar</label>
                            <textarea name="content" id="content" cols="30" rows="5" class="w-full p-2 border rounded-md mb-2"></textarea>
                            <button type="submit" class="bg-red-500 text-white p-1 rounded-md">Enviar</button>
                        </form>
                    </div>
        @endif
    @endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        var toggleCommentsButtons = document.querySelectorAll('.toggleComments');

        toggleCommentsButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var targetId = this.getAttribute('data-target');
                var commentsContainer = document.getElementById(targetId);
                commentsContainer.classList.toggle('hidden');
            });
        });
    </script>
@stop
