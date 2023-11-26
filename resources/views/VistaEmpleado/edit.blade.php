@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow-lg sm:rounded-lg">
            <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
                <p class="text-1xl font-semibold mb-4">Editar Empleado</p>
                <form action="{{ route('empleado.update', $empleado->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="ci" class="block text-gray-700 text-sm font-bold mb-2">C.I.</label>
                            <input type="number" name="ci" id="ci" value="{{ $empleado->ci }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $empleado->nombre }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" oninput="ConvertirPrimeraLetra(this)">
                            <script>
                                function ConvertirPrimeraLetra(input) {
                                  input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                                    return a.toUpperCase();
                                  });
                                }
                            </script>
                        </div>
                        <div>
                            <label for="celular" class="block text-gray-700 text-sm font-bold mb-2">Celular</label>
                            <input type="number" name="celular" id="celular" value="{{ $empleado->celular }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo</label>
                            <input type="email" name="correo" id="correo" value="{{ $empleado->correo }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                            <input type="text" name="direccion" id="direccion" value="{{ $empleado->direccion }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" oninput="ConvertirPrimeraLetra(this)">
                        </div>
                        <div>
                            <label for="cargo" class="block text-gray-700 text-sm font-bold mb-2">Profesion</label>
                            <input type="text" name="cargo" id="cargo" value="{{ $empleado->cargo }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" oninput="ConvertirPrimeraLetra(this)">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                        class="bg-cyan-500 hover:bg-cyan-700 text-white font-semibold py-1 px-2 rounded-full ml-1 transition duration-300 ease-in-out transform hover:scale-105 text-sm">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
