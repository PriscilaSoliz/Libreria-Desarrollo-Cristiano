@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Docentes')

@section('content_header')
    <h1 class="text-2xl font-semibold">Docentes</h1>
@stop

@section('content')
    <form class="w-full max-w-sm" action="{{ route('docente.store') }}" method="POST">
        @csrf
        <div class="flex items-center border-b border-teal-500 py-2">
            <input
                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                type="text" name="nombre" id="nombre" placeholder="Escribe.." aria-label="Full name">
                <button class="flex-shrink-0 bg-blue-800 hover:bg-blue-900 border-blue-800 hover:border-blue-900 text-sm font-bold border-4 text-white py-1 px-2 rounded" type="submit">
                    Añadir
                </button>

        </div>
    </form>
    <div class="py-2 px-18 h-full ">
        <div class="py-1">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 h-[100vh] max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-gray-900 overflow-auto">
                    <table class="table-auto w-full divide-y divide-gray-300">
                        <div class="text-center mt-1 mb-2">
                            <a class="text-2x1 font-mono font-semibold text-black">LISTA DE DOCENTES</a>
                        </div>
                        <thead >
                            <tr>
                                <th class="px-2 py-1 text-center text-white bg-blue-800">Nro</th>
                                <th class="px-6 py-1 text-center text-white bg-blue-800">Docente</th>
                                <th class="px-4 py-1 text-center bg-blue-800"></th>
                                <th class="px-4 py-1 text-center bg-blue-800"></th>
                            </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($docente as $d)
                            <tbody >
                                <tr class="bg-white text-gray-700 hover:border-white hover:bg-gray-100 transition">
                                    <td class="py-3 text-sm text-center">{{ $i }}</td>
                                    <td class="py-3 text-sm text-left">{{ $d->nombre }}</td>
                                    <td class="py-3 text-sm text-center"></td>
                                    <td class=" ">
                                        <div class="flex ml-4  justify-end text-right  ">
                                            {{-- @can('cotizacion.edit') --}}
                                            <div class="flex justify-center">
                                                <a title="EDITAR" type="button" href="{{ route('docente.edit', $d->id) }}"
                                                    class="   rounded-lg w-fit p-2 mx-2 text-white
                                            hover:scale-90 transition-transform delay-75">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>

                                            </div>
                                            {{-- @endcan --}}
                                            {{-- @can('cotizacion.destroy') --}}
                                            <div>
                                                <form action="{{ route('docente.destroy', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="text" name="id" class="hidden" value="">
                                                    {{-- <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')"> --}}
                                                    <button type="submit" title="ELIMINAR"
                                                        class="w-fit py-2   rounded-lg text-white
                                                      hover:scale-90 transition-transform delay-75"
                                                        onclick="return confirm('Desea Eliminar?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-6 h-6 text-red-600">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            {{-- @endcan --}}

                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
