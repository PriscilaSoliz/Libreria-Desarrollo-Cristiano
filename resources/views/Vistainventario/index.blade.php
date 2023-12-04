@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-2 px-18 h-full ">
        <div class=" flex justify-between items-center ">
            <H1></H1>
            @if (session('success'))
                <div class="text-center">
                    <p class="text-white py-1 px-2 sm:py-2 sm:px-4 bg-lime-500 text-xs sm:text-sm rounded-xl">
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        </div>

        <div class="py-1">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 h-[100vh] max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-gray-900 overflow-auto">


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


                                    <td class=" ">
                                        <!-- Aquí puedes agregar enlaces o botones para editar o eliminar si es necesario -->
                                    </td>
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
