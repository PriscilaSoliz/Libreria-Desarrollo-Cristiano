@extends('layouts.app')
@section('content')
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">
                @can('VistaEmpleado.index')
                <div class="flex justify-start" style="margin-top: 28px;">
                    <a href="{{ route('empleado.create') }}"
                        class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full ml-12 transition duration-300 ease-in-out transform hover:scale-105">
                        Agregar Empleado
                    </a>
                </div>
                @endcan
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row items-center">
                        <h2 class="text-2xl font-semibold ml-4">Lista de Empleados</h2>
                       
                    </div>
                    <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-300 mt-4">
                        <thead>
                            <tr>
                                <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    C.I.</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Celular</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Correo</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Dirección</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                    Cargo</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                </th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($empleado as $e)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->ci }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->celular }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->correo }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->direccion }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->cargo }}</td>
                                    @can('VistaEmpleado.index')
                                    <td class="px-1 py-4 whitespace-no-wrap">

                                        <a href="{{ route('empleado.edit',$e->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full transition-transform transform hover:scale-110">
                                             <svg class="w-4 h-4 inline-block fill-current mr-1"
                                                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                 <path
                                                     d="M14.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.32.222l-4 1a1 1 0 01-1.221-1.22l1-4a1 1 0 01.222-.321l9-9zM15 2a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V3a1 1 0 011-1h4z" />
                                             </svg>
                                         </a>


                                    </td>
                                    @endcan
                                    @can('VistaEmpleado.index')
                                    <td class="px-1 py-4 whitespace-no-wrap">
                                        <form action="{{ route('empleado.destroy', $e->id) }}" method="POST">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
