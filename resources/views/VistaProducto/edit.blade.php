@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          
            <h2 class="text-2xl font-semibold mb-4">Editar Producto</h2>

            <form action="{{ route('producto.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Indica que esta es una solicitud PUT para actualizar -->

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código</label>
                        <input type="text" name="codigo" id="codigo" value="{{ $producto->codigo }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Producto</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="autor" class="block text-gray-700 text-sm font-bold mb-2">Autor</label>
                        <input type="text" name="autor" id="autor" value="{{ $producto->autor }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="version" class="block text-gray-700 text-sm font-bold mb-2">Versión</label>
                        <input type="text" name="version" id="version" value="{{ $producto->version }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="editorial" class="block text-gray-700 text-sm font-bold mb-2">Editorial</label>
                        <input type="text" name="editorial" id="editorial" value="{{ $producto->editorial }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                        <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="{{ $producto->cantidad }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label for="ubicacion" class="block text-gray-700 text-sm font-bold mb-2">Ubicación</label>
                        <input type="text" name="ubicacion" id="ubicacion" value="{{ $producto->ubicacion }}" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
