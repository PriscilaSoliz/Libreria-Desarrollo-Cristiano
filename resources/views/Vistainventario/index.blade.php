@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-2 px-18 h-full ">
        <div class=" flex justify-between items-center ">
            <H1></H1>
            @if (session('success'))
                <div class="text-center">
                    <p class="text-white py-1 px-2 sm:py-3 sm:px-4 bg-lime-500 text-xs sm:text-sm rounded-xl">
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        </div>

        <div class="py-1">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4  max-w-7-auto sm:px-6 lg:px-8 overflow-y-auto ">
                <div class="text-gray-900 overflow-auto">
                    <form method="GET" action="{{ route('inventario.index') }}">
                        @csrf
                        <div class="mb-4 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                            <div>
                                <label for="provedor" class="mr-1 ml-1">Proveedor:</label>
                                <select name="provedor" id="provedor">
                                    <option value="">Todos</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{ $proveedor }}" @if(request('provedor') == $proveedor) selected @endif>{{ $proveedor }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="categoria" class="mr-1 ml-4">Categoría:</label>
                                <select name="categoria" id="categoria">
                                    <option value="">Todas</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria }}" @if(request('categoria') == $categoria) selected @endif>{{ $categoria }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="autor" class="mr-1 ml-1">Autor:</label>
                                <select name="autor" id="autor">
                                    <option value="">Todas</option>
                                    @foreach($autores as $autor)
                                        <option value="{{ $autor }}" @if(request('autor') == $autor) selected @endif>{{ $autor }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="editorial" class="mr-1 ml-1">Editoriales:</label>
                                <select name="editorial" id="editorial">
                                    <option value="">Todas</option>
                                    @foreach($editoriales as $editorial)
                                        <option value="{{ $editorial }}" @if(request('editorial') == $editorial) selected @endif>{{ $editorial }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="ubicacion" class="mr-2 ml-4">Ubicaciones:</label>
                                <select name="ubicacion" id="ubicacion">
                                    <option value="">Todas</option>
                                    @foreach($ubicaciones as $ubicacion)
                                        <option value="{{ $ubicacion }}" @if(request('ubicacion') == $ubicacion) selected @endif>{{ $ubicacion }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Agrega más bloques para otros filtros según sea necesario -->

                            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
                        </div>

                    </form>




                    <table class="table-auto w-full">
                        <div class="text-center mt-4">
                            <a class="text-1xl font-mono font-semibold text-gray-500">LISTA DEL INVENTARIO</a>
                        </div>
                        <thead>
                            <tr class="text-xs text-left font-semibold text-gray-500">
                                <th class="px-2 py-3 text-center">Nro</th>
                                <th class="px-4 py-3 text-center">Cod</th>
                                <th class="px-6 py-3 text-center">Nombre</th>
                                <th class="px-4 py-3 text-center">Autor</th>
                                <th class="px-4 py-3 text-center">Editorial</th>
                                <th class="px-4 py-3 text-center">Precio</th>
                                <th class="px-6 py-3 text-center">Stock</th>
                                <th class="px-4 py-3 text-center">Ubicacion</th>
                                <th class="px-4 py-3 text-center">Categoria</th>
                                <th class="px-4 py-3 text-center">Proveedor</th>
                                <th class="px-4 py-3 text-center">Fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($productos as $producto)
                                <tr class="bg-white text-gray-700 hover:border-white hover:bg-gray-100 transition">
                                    <td class="py-3 text-sm text-center">{{ $producto->id }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->codigo }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->nombre }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->autor }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->editorial }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->precio }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->cantidad }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->ubicacion }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->categoria->descripcion }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->provedor->nombre ?? 'Sin proveedor' }}</td>
                                    <td class="py-3 text-sm text-center">{{ $producto->updated_at }}</td>


                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection

