@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

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
                        window.location.href = "{{ route('producto.index') }}";
                    });
                </script>
                <h2 class="text-2xl font-semibold mb-4">Editar Producto</h2>

                <form action="{{ route('producto.update', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Indica que esta es una solicitud PUT para actualizar -->

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código</label>
                            <input type="text" name="codigo" id="codigo" value="{{ $producto->codigo }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre Producto</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="autor" class="block text-gray-700 text-sm font-bold mb-2">Autor</label>
                            <input type="text" name="autor" id="autor" value="{{ $producto->autor }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="version" class="block text-gray-700 text-sm font-bold mb-2">Versión</label>
                            <input type="text" name="version" id="version" value="{{ $producto->version }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="editorial" class="block text-gray-700 text-sm font-bold mb-2">Editorial</label>
                            <input type="text" name="editorial" id="editorial" value="{{ $producto->editorial }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                            <input type="number" name="precio" id="precio" value="{{ $producto->precio }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" value="{{ $producto->cantidad }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="ubicacion" class="block text-gray-700 text-sm font-bold mb-2">Ubicación</label>
                            <input type="text" name="ubicacion" id="ubicacion" value="{{ $producto->ubicacion }}"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>

                        <div>
                            <label for="proveedor" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                                @foreach ($provedor as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoria</label>
                            <select name="categoria_id" id="categoria_id"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                                @foreach ($categoria as $c)
                                    <option value="{{ $c->id }}">{{ $c->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                  <div class="grid grid-cols-1 mt-5 mx-7">
                    <img src="/imagen/{{ $producto->imagen }}" width="200px" id="imagenSeleccionada">
                </div>                                    
                
                <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                            </div>
                        <input name="imagen" id="imagen" type='file' class="hidden" />
                       
                        </label>
                    </div>
                </div>

                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <a href="{{ route('productos.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                </div>
                </form>
            </div>
        </div>
    @endsection
