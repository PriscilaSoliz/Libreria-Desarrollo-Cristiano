@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg bg-white overflow-hidden p-6 border rounded-lg"
                style="font-family: 'Verdana', sans-serif;">
                <p class="text-center font-semibold mb-4">Añadir Un Nuevo Producto</p>

                <form action="{{ route('detallecompra.añadir') }}" method="POST" enctype="multipart/form-data"
                    class="grid {{-- En dispositivos grandes muestra 2 columnas --}} md:grid-cols-2 gap-4">
                    @csrf
                    @if (isset($compra))
                        <label>Nota de Compra: </label>
                        <input type="texto" name="compra_id" id="compra_id" value="{{ $compra->id }}">
                    @endif
                    <!-- Inputs simplificados usando clases de Tailwind CSS -->
                    <input type="text" name="codigo" id="codigo"
                        class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required
                        placeholder="Codigo">
                    <input type="text" name="nombre" id="nombre"
                        class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required
                        placeholder="Nombre Producto">
                    <input type="text" name="autor" id="autor"
                        class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Autor">
                    <input type="text" name="version" id="version"
                        class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Version">
                    <input type="text" name="editorial" id="editorial"
                        class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required
                        placeholder="Editorial">
                    <input type="number" name="precio" id="precio"
                        class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required
                        placeholder="Precio">
                    <!-- Dropdowns -->
                    <div>
                        <select name="proveedor_id" id="proveedor_id"
                            class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="" selected>Selecciona Proveedor</option>
                            @foreach ($provedor as $p)
                                <option value="{{ $p->ci }}">{{ $p->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <select name="categoria_id" id="categoria_id"
                        class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach ($categoria as $c)
                            <option value="{{ $c->id }}">{{ $c->descripcion }}</option>
                        @endforeach
                    </select>
                    <!-- Botones -->
                    <div class="flex items-center justify-center md:flex-row flex-col md:gap-4 pt-1 pb-1">
                        <a href="{{ route('detallecompra.index') }}"
                            class="w-full md:w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-1 mb-2 md:mb-0 md:mt-0">Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-1'>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
