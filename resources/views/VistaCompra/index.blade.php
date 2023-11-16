{{-- @extends('layouts.app') --}}
@extends('adminlte::page')
@section('content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
        <div class="bg-white overflow-hidden sm:rounded-lg"
            style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">

            <form action="{{route('compra.store')}}" method="POST"
                  class="p-4 space-y-4"> <!-- Agregamos padding y espacio vertical entre elementos -->
                @csrf
                <div class="grid grid-cols-3 gap-4">

                   <div>
                    <label for="formapago" class="block text-gray-700 text-sm font-bold mb-2">Forma de pago</label>
                        <select name="formapago" id="formapago" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option>Efectivo</option>
                                <option>Qr</option>
                                <option>Tarjeta</option>
                        </select>
                    </div>


                    <div>
                        <label for="proveedor" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
                        <select name="proveedor_id" id="proveedor_id" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @foreach($provedor as $p)
                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <script>
                        function ConvertirPrimeraLetra(input) {
                          input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                            return a.toUpperCase();
                          });
                        }
                        </script>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Añadir</button>
                </div>
                <div class="mt-4">
                <a href="{{ route('detallecompra.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Detalle
            </a>
             </div>
            </form>
        </div>
    </div>
</div>








    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 1px; font-family: 'Verdana', sans-serif;">

                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row items-center">
                        <h2 class="text-2xl font-semibold ml-4">Compra</h2>

                    </div>
                    <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-300 mt-4">
                        <thead>
                            <tr>
                                <th
                                class="px-4 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                            Id</th>
                                <th
                                class="px-4 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                            forma de pago</th>

                             <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                    Provedor</th>
                                    <th
                                    class="px-4 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                fecha</th>
                                <th
                                    class="px-4 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                Total</th>

                            </tr>
                        </thead>
                        @foreach ($compra as $e)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->id }}</td>

                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->formapago }}</td>
                            <td class="px-4 py-4 whitespace-no-wrap">{{ $e->provedor->nombre }}</td>
                            {{-- <td class="px-6 py-4 whitespace-no-wrap">{{ $e->proveedor }}</td> --}}
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->created_at }}</td>

                            <td class="px-4 py-4 whitespace-no-wrap">0</td>

                        @endforeach
                    </table
                </div>
            </div>
        </div>
    </div>
@endsection

