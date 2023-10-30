@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg">
                <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
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
                            window.location.href = "{{ route('provedor.index') }}";
                        });
                    </script>
                    <h2 class="text-2xl font-semibold mb-4">Registrar un Nuevo Proveedor</h2>
                    <form action="{{ route('provedor.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="ci" class="block text-gray-700 text-sm font-bold mb-2">CI/NIT</label>
                                <input type="number" name="ci" id="ci"
                                    class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div>
                                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                                <input type="text" name= "nombre" id="nombre"
                                    class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" oninput="ConvertirPrimeraLetra(this)">
                            </div>
                            <script>
                                function ConvertirPrimeraLetra(input) {
                                  input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                                    return a.toUpperCase();
                                  });
                                }
                                </script>
                            <div>
                                <label for="celular" class="block text-gray-700 text-sm font-bold mb-2">Celular</label>
                                <input type="number" name="celular" id="celular"
                                    class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div>
                                <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Direccion</label>
                                <input type="text" name="direccion" id="direccion"
                                    class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" oninput="ConvertirPrimeraLetra(this)">
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
