@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <button id="volverButton"
                    class="bg-indigo-300 text-white rounded-md px-2 py-1 text-xs hover:bg-indigo-600 inline-flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver
                </button>
                <script>
                    document.getElementById("volverButton").addEventListener("click", function() {
                        window.location.href = "{{ route('notadeentrada.index') }}";
                    });
                </script>
                <h2 class="text-2xl font-semibold mb-4">Nota de Entrada</h2>

                <form action="#" method="POST">
                    @csrf
                    @method('PUT') <!-- Indica que esta es una solicitud PUT para actualizar -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código</label>
                            <input type="text" name="codigo" id="codigo" value=""
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                disabled>
                        </div>
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Producto</label>
                            <input type="text" name="nombre" id="nombre" value=""
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" disabled>
                        </div>
                        <div>
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" value="0"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <button type="submit" name="entrada" value="entrada"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar
                            Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
