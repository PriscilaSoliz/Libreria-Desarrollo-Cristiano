@extends('layouts.app')
@section('content')
    {{-- <div class="py-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-blue overflow-hidden sm:rounded-lg"

                        <div class="flex flex-row items-center ">
                            <form action="{{ route('producto.index') }}" method="GET" class="ml-4 flex">
                                <button type="submit"
                                    class="bg-indigo-600 text-white rounded-full px-4 py-2 text-base hover:bg-indigo-900 inline-flex items-center mr-6">
                                    <span class="material-symbols-outlined">Buscar</span>
                                </button>
                                <input type="text" name="buscar"
                                    class="border border-gray-300 bg-gray-100 py-2 px-3 rounded-full w-full sm:w-80 max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl placeholder-gray-500"
                                    placeholder="Escribe" value="{{ $buscar }}">
                            </form>
                        </div>

            </div>
        </div>
    </div> --}}



    <div class="py-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">
                <div class="bg-blue overflow-x-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue border-b border-gray-200">

                        <div class="flex flex-row items-center justify-between mb-3">
                            {{-- <h2 class="text-2xl font-semibold ml-6">Lista de Producto</h2> --}}
                            <div class="flex flex-row items-center ">
                                <form action="{{ route('producto.index') }}" method="GET" class="ml-4 flex">
                                    <button type="submit"
                                        class="bg-indigo-600 text-white rounded-full px-4 py-2 text-base hover:bg-indigo-900 inline-flex items-center mr-6">
                                        <span class="material-symbols-outlined">Buscar</span>
                                    </button>

                                    <input type="text" name="buscar"
                                        class="border border-gray-300 bg-gray-100 py-2 px-3 rounded-full w-full sm:w-80 max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl placeholder-gray-500"
                                        placeholder="Escribe" value="{{ $buscar }}">
                                </form>
                            </div>
                            @can('VistaProducto.Create')
                                <a href="{{ route('producto.create') }}"
                                class="bg-indigo-600 text-white rounded-full px-4 py-2 text-base hover:bg-indigo-900 inline-flex items-center">
                                    Añadir
                                </a>
                            @endcan
                        </div>

                        <table class="table-min" style="margin-top: 20px;">
                            <thead>
                                <tr>
                                    <th
                                        class="px-1 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Codigo
                                    </th>
                                    <th
                                        class="px-10 py-3  bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider w-1/3">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-1 py-3 bg-orange-500 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">

                                    </th>
                                    <th
                                        class="px-2 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Cantidad
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Autor
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Version
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Editorial
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Categoria
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Proveedor
                                    </th>
                                    <th
                                        class="px-2 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                        Ubicacion
                                    </th>

                                    <th
                                        class="px-1 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">

                                    </th>
                                    <th
                                        class="px-1 py-3 bg-orange-500 text-center text-xs leading-4 font-medium text-white uppercase tracking-wider">

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
                                        <td class="px-1 py-1 whitespace-no-wrap">{{ $p->codigo }}</td>
                                        <td class="px-10 py-1 whitespace-no-wrap">{{ $p->nombre }}</td>
                                        <td class="px-1 py-1 whitespace-no-wrap">
                                            <form action="{{ route('producto.edit', $p->id) }}" method="POST">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" name="entrada"
                                                    class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                                    <i class="fa-solid fa-square-poll-horizontal"
                                                        style="color: #010a18; font-size: 1.5em;"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-2 py-1 whitespace-no-wrap text-center">{{ $p->precio }}</td>
                                        <td class="px-2 py-1 whitespace-no-wrap text-center">{{ $p->cantidad }}</td>
                                        <td class="px-6 py-1 whitespace-no-wrap">{{ $p->autor }}</td>
                                        <td class="px-6 py-1 whitespace-no-wrap">{{ $p->version }}</td>
                                        <td class="px-6 py-1 whitespace-no-wrap text-center">{{ $p->editorial }}</td>
                                        <td class="px-4 py-1 whitespace-no-wrap">
                                            {{ $p->categoria->descripcion }}
                                        </td>
                                        <td class="px-4 py-1 whitespace-no-wrap">
                                            {{ $p->provedor->nombre }}
                                        </td>
                                        <td class="px-2 py-3 whitespace-no-wrap text-center">{{ $p->ubicacion }}</td>

                                        <td class="px-1 py-1| whitespace-no-wrap">
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
                                        <td class="px-1 py-4 whitespace-no-wrap">
                                            @can('VistaProducto.detroy')
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
                                        <td class="px-1 py-1 whitespace-no-wrap">{{ $p->codigo }}</td>
                                        <td class="px-10 py-1 whitespace-no-wrap">{{ $p->nombre }}</td>
                                        <td class="px-1 py-1 whitespace-no-wrap">
                                            <form action="{{ route('producto.edit', $p->id) }}" method="POST">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" name="entrada"
                                                    class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                                    <i class="fa-solid fa-square-poll-horizontal"
                                                        style="color: #010a18; font-size: 1.5em;"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-2 py-1 whitespace-no-wrap">{{ $p->precio }}</td>
                                        <td class="px-2 py-1 whitespace-no-wrap text-center">{{ $p->cantidad }}</td>
                                        <td class="px-6 py-1 whitespace-no-wrap">{{ $p->autor }}</td>
                                        <td class="px-6 py-1 whitespace-no-wrap">{{ $p->version }}</td>
                                        <td class="px-6 py-1 whitespace-no-wrap text-center">{{ $p->editorial }}</td>
                                        <td class="px-4 py-1 whitespace-no-wrap">
                                            {{ $p->categoria->descripcion }}
                                        </td>
                                        <td class="px-4 py-1 whitespace-no-wrap">
                                            {{ $p->provedor->nombre }}
                                        </td>
                                        <td class="px-2 py-1 whitespace-no-wrap text-center">{{ $p->ubicacion }}</td>
                                        <td class="px-1 py-1 whitespace-no-wrap">
                                            @can('VistaProducto.edit')
                                                <a href="{{ route('producto.edit', $p->id) }}"
                                                    class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-6 h-6 text-blue-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            @endcan
                                        </td>
                                        <td class="px-1 py-1 whitespace-no-wrap">
                                            @can('VistaProducto.detroy')
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

    <style>
        @media (max-width: 768px) {

            .table-min td,
            .table-min th {
                font-size: 12px;
                /* Tamaño de fuente para dispositivos móviles */
            }

            .px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }

            .py-1 {
                padding-top: 0.25rem;
                padding-bottom: 0.25rem;
            }

            .text-sm {
                font-size: 0.875rem;
                /* 14px */
            }

            .w-full {
                width: 100%;
            }

            .sm\:w-40 {
                width: 10rem;
            }
        }

        <style>@media (max-width: 768px) {}
    </style>
@endsection
