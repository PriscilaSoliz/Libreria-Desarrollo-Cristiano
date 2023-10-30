@extends('layouts.app')
@section('content')
    <div class="py-5">
        <div class="max-w-9x1 mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">

                <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
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
                                        class="px-10 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Proveedor
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
                                        <td class="px-12 py-3 whitespace-no-wrap">
                                            {{ $p->provedor->nombre }}
                                        </td>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->precio }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->cantidad }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->autor }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->version }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap text-center">{{ $p->editorial }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->ubicacion }}</td>

                                    </tr>
                                @endforeach
                                @foreach ($productosNoCoincidentes as $p)

                                    <tr>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $p->codigo }}</td>
                                        <td class="px-12 py-3 whitespace-no-wrap">{{ $p->nombre }}</td>
                                        <td class="px-12 py-3 whitespace-no-wrap">
                                            {{ $p->provedor->nombre }}
                                        </td>
                                        <td class="px-2 py-3 whitespace-no-wrap">{{ $pro->precio }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->cantidad }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->autor }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap">{{ $p->version }}</td>
                                        <td class="px-6 py-3 whitespace-no-wrap text-center">{{ $p->editorial }}</td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->ubicacion }}</td>

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
