@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg">
                <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
                    <button id="volverButton"
                        class="bg-cyan-500 text-white rounded-md px-2 py-1 text-xs hover:bg-cyan-700 inline-flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver
                    </button>
                <script>
                    document.getElementById("volverButton").addEventListener("click", function () {
                        window.location.href = "{{ route('cliente.index') }}";
                    });
                </script>
                <h2 class="text-2xl font-semibold mb-4">Editar Producto</h2>
                <form action="{{ route('cliente.update', $cliente->ci) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Indica que esta es una solicitud PUT para actualizar -->

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">C.I.</label>
                            <input type="text" name="codigo" id="codigo" value="{{ $cliente->ci }}"
                                   class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $cliente->nombre }}"
                                   class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Celular</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $cliente->celular }}"
                                   class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Direccion</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $cliente->direccion }}"
                                   class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Correo</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $cliente->correo }}"
                                   class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <!-- Otros campos del formulario -->
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                        class="bg-cyan-500 hover:bg-cyan-700 text-white font-semibold py-1 px-2 rounded-full ml-1 transition duration-300 ease-in-out transform hover:scale-105 text-sm">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
