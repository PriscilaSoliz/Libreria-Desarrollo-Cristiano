@extends('adminlte::page')
@section('title', 'Bienvenidad')
@section('content_header')
    <h1 class="text-2xl font-semibold mt-2">Docentes</h1>
@stop
@section('content')
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

                        <tbody >
                            <tr class="bg-white text-gray-700 hover:border-white hover:bg-gray-100 transition">
                                <td class="py-3 text-sm text-center"></td>
                                <td class="py-3 text-sm text-left"></td>
                                <td class="py-3 text-sm text-center"></td>

                                <td class=" ">
                                    <div class="flex ml-4  justify-end text-right  ">
                                        {{-- @can('cotizacion.edit') --}}
                                        <div class="flex justify-center">
                                            <a title="EDITAR" type="button" href=""
                                                class="   rounded-lg w-fit p-2 mx-2 text-white
                                    hover:scale-105 transition-transform delay-75">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    class="w-6 h-6 text-blue-800">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                        </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>

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
