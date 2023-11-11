@extends('layouts.app')
@section('content')
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
        <div class="bg-white overflow-hidden sm:rounded-lg shadow-md p-6">

            <form action="#" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @csrf <!-- Agrega esto para protección contra ataques CSRF -->

                <div class="mb-4">
                    <label for="id" class="block text-gray-800 text-sm font-semibold mb-2">ID:</label>
                    <input type="text" name="id" id="id" class="border rounded w-full py-2 px-3 text-gray-700 bg-gray-100 focus:outline-none focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-800 text-sm font-semibold mb-2">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="border rounded w-full py-2 px-3 text-gray-700 bg-gray-100 focus:outline-none focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label for="celular" class="block text-gray-800 text-sm font-semibold mb-2">Celular:</label>
                    <input type="text" name="celular" id="celular" class="border rounded w-full py-2 px-3 text-gray-700 bg-gray-100 focus:outline-none focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label for="direccion" class="block text-gray-800 text-sm font-semibold mb-2">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="border rounded w-full py-2 px-3 text-gray-700 bg-gray-100 focus:outline-none focus:border-indigo-500" required>
                </div>


            </form>
            <button type="submit"
            class="bg-indigo-600 text-white rounded-full px-4 py-2 text-base hover:bg-indigo-900 inline-flex items-center mr-6">
                Realizar Venta
            </button>
        </div>
    </div>
</div>




<script>
    function ConvertirPrimeraLetra(input) {
      input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
        return a.toUpperCase();
      });
    }
</script>








    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 1px; font-family: 'Verdana', sans-serif;">

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row items-center">
                        <h2 class="text-2xl font-semibold ml-4">Nota de Venta</h2>

                    </div>
                    <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-300 mt-4">
                        <thead>
                            <tr>
                                <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Id</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    producto</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                </th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                </th>

                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-1 whitespace-no-wrap">id</td>
                                    <td class="px-6 py-1 whitespace-no-wrap">producto</td>
                                    <td class="px-1 py-1 whitespace-no-wrap">
                                        <a href="#"
                                            class="py-2 text-white hover:scale-125 transition-transform delay-75 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                         </a>
                                    </td>
                                    {{-- @endcan --}}
                                    <td class="px-1 py-1 whitespace-no-wrap">
                                        <form action="#" method="POST">
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

                                </tr>
                        </tbody>

                    </table
                </div>
            </div>
        </div>
    </div>
@endsection
