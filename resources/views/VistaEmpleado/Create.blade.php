@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Crear Empleado</h2>
                <form action="{{route('empleado.store')}}" method="POST" >
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="ci" class="block text-gray-700 text-sm font-bold mb-2">C.I.</label>
                            <input type="number" name="ci" id="ci" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="celular" class="block text-gray-700 text-sm font-bold mb-2">Celular</label>
                            <input type="number" name= "celular" id="celular" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo</label>
                            <input type="email" name="correo" id="correo" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="cargo" class="block text-gray-700 text-sm font-bold mb-2">Cargo</label>
                            <input type="text" name="cargo" id="cargo" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

