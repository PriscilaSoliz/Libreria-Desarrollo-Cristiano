@extends('layouts.app')
@section('content')
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">
            @can('admin.users.index')
            <div class="flex justify-start" style="margin-top: 28px;">
                <a href="{{ route('producto.create') }}"
                    class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full ml-12 transition duration-300 ease-in-out transform hover:scale-105">
                    Agregar Producto
                </a>
            </div>
            @endcan
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row items-center">
                        <h2 class="text-2xl font-semibold ml-4">Lista de Producto</h2>
                        <form action="{{ route('producto.index') }}" method="GET" class="ml-4 flex">
                            <input type="text" name="buscar" class="border border-gray-300 bg-gray-100 h-10 px-3 rounded-full w-full placeholder-gray-500" placeholder="Buscar" value="{{ $buscar }}">
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-full ml-2">
                                <span class="material-symbols-outlined">Buscar</span>
                            </button>
                        </form>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Codigo
                                </th>
                                <th class="px-10 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th class="px-2 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Cantidad
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Autor
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Version
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Editorial
                                </th>
                                <th class="px-2 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Ubicacion
                                </th>
                                <th class="px-1 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                                </th>
                                <th class="px-1 py-3 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

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
                                        @can('admin.users.index')
                                            <a href="{{ route('producto.edit', $p->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full">
                                                <svg class="w-4 h-4 inline-block fill-current mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M14.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.32.222l-4 1a1 1 0 01-1.221-1.22l1-4a1 1 0 01.222-.321l9-9zM15 2a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V3a1 1 0 011-1h4z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endcan
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        @can('admin.users.index')
                                            <form action="{{ route('producto.destroy', $p->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-7 h-7 rounded-lg bg-red-600 text-gray-200 shadow p-1 transform hover:bg-red-700 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                                        @can('admin.users.index')
                                            <a href="{{ route('producto.edit', $p->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full">
                                                <svg class="w-4 h-4 inline-block fill-current mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M14.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.32.222l-4 1a1 1 0 01-1.221-1.22l1-4a1 1 0 01.222-.321l9-9zM15 2a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V3a1 1 0 011-1h4z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endcan
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        @can('admin.users.index')
                                            <form action="{{ route('producto.destroy', $p->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-7 h-7 rounded-lg bg-red-600 text-gray-200 shadow p-1 transform hover:bg-red-700 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
