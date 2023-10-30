@extends('layouts.app')
@section('content')
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">

                <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @can('VistaProducto.Create')
<<<<<<< Updated upstream
                        <div class="flex flex-col lg:flex-row justify-start mb-4" style="margin-top: 10px;">
                            <a href="{{ route('producto.create') }}"
                                class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full mb-2 lg:mb-0 lg:ml-6 transition duration-300 ease-in-out transform hover:scale-105 text-center">
                                Agregar Producto
                            </a>
                            <a href="{{ route('producto.create') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-full ml-6 lg:ml-auto transition duration-300 ease-in-out transform hover:scale-105 text-center">
                                Ver Detalles
                            </a>
                        </div>
=======
                            <div class="flex justify-start mb-4" style="margin-top: 10px;">
                                <a href="{{ route('producto.create') }}"
                                    class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full ml-6 transition duration-300 ease-in-out transform hover:scale-105">
                                    Agregar Producto
                                </a>
                                <a href="{{ route('producto.create') }}"
                                class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full ml-6 transition duration-300 ease-in-out transform hover:scale-105">
                                 Ver Detalles
                            </a>
                            </div>
>>>>>>> Stashed changes
                        @endcan
                      
                        <div class="flex flex-row items-center mb-3">
                            <h2 class="text-2xl font-semibold ml-6">Lista de Producto</h2>
                        </div>
                        <div class="flex flex-row items-center">

                            <form action="{{ route('producto.index') }}" method="GET" class="ml-4 flex">
                                <input type="text" name="buscar"
                                    class="border border-gray-300 bg-gray-100 py-2 px-3 rounded-full w-full sm:w-80 max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl placeholder-gray-500"
                                    placeholder="Escribe" value="{{ $buscar }}">

                                <button type="submit"
                                    class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-2 rounded-full ml-4 transition duration-300 ease-in-out transform hover:scale-105">
                                    <span class="material-symbols-outlined">Buscar</span>
                                </button>
                            </form>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200 mt-4">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Codigo
                                    </th>
                                    <th
                                        class="px-10 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Cantidad
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Autor
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Version
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Editorial
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Ubicacion
                                    </th>
                                    <th
                                        class="px-1 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                                    </th>
                                    <th
                                        class="px-1 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                    $productosCoincidentes = [];
                                    $productosNoCoincidentes = [];
                                @endphp

                                @foreach ($producto as $p)
                                    @if (strpos(strtolower($p->nombre), strtolower($buscar)) !== false ||
                                            strpos(strtolower($p->codigo), strtolower($buscar)) !== false)
                                        @php
                                            $productosCoincidentes[] = $p;
                                        @endphp
                                    @else
                                        @php
                                            $productosNoCoincidentes[] = $p;
                                        @endphp
                                    @endif
                                @endforeach

                                @foreach ($productosCoincidentes as $p)
                                    <tr>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->codigo }}</td>
                                        <td class="px-12 py-3 whitespace-no-wrap">{{ $p->nombre }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->precio }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->cantidad }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->autor }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->version }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap text-center">{{ $p->editorial }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->ubicacion }}</td>
                                        <td class="px-1 py-3 whitespace-no-wrap">
                                            @can('VistaProducto.edit')
                                                <a href="{{ route('producto.edit', $p->id) }}"
                                                    class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            @endcan
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            @can('VistaProducto.edit')
                                                <form action="{{ route('producto.destroy', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="w-7 h-7 rounded-lg bg-red-600 text-gray-200 shadow p-1 transform hover:bg-red-700 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($productosNoCoincidentes as $p)
                                    <tr>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->codigo }}</td>
                                        <td class="px-12 py-3 whitespace-no-wrap">{{ $p->nombre }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->precio }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->cantidad }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->autor }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->version }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap text-center">{{ $p->editorial }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->ubicacion }}</td>

                                        <td class="px-1 py-3 whitespace-no-wrap">
                                            @can('VistaProducto.edit')
                                                <a href="{{ route('producto.edit', $p->id) }}"
                                                    class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            @endcan
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            @can('VistaProducto.edit')
                                                <form action="{{ route('producto.destroy', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="w-7 h-7 rounded-lg bg-red-600 text-gray-200 shadow p-1 transform hover:bg-red-700 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
