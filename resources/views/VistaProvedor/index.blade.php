@extends('layouts.app')
@section('content')
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">
                <div class="flex" style="margin-top: 30px; margin-bottom: 5px;">
                    <a href="{{ route('provedor.create') }}"
                       class="ml-8 bg-indigo-600 text-white rounded-md px-4 py-2 text-base hover:bg-indigo-900 inline-flex items-center mb-4">
                        Registrar Proveedor
                    </a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row items-center">
                        <h2 class="text-2xl font-semibold ml-4">Lista de Proveedores</h2>

                    </div>
                    <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-300 mt-4">
                        <thead>
                            <tr>
                                <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    CI/Nit</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Celular</th>
                                <th
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Dirección</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                </th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($provedor as $p)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $p->ci}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $p->nombre}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $p->celular}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $p->direccion}}</td>
                                    @can('VistaProvedor.edit')
                                    <td class="px-1 py-4 whitespace-no-wrap">

                                        <a href="{{ route('provedor.edit', $p->id) }}"
                                            class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                         </a>
                                    </td>
                                    @endcan
                                    {{-- @endcan --}}
                                    @can('VistaProvedor.edit')
                                    <td class="px-1 py-4 whitespace-no-wrap">
                                        <form action="{{ route('provedor.destroy', $p->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-7  h-7 rounded-lg bg-red-600 text-gray-200 shadow p-1
                         transform hover:bg-red-700 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    @endcan
                                    {{-- <td class="px-6 py-4 whitespace-no-wrap">
                                        <!-- Agrega enlaces o botones para acciones adicionales, si es necesario -->
                                    </td> --}}
                                </tr>
                        </tbody>
                        @endforeach
                    </table
                </div>
            </div>
        </div>
    </div>
@endsection
