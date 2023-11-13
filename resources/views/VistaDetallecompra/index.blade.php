@extends('layouts.app')
@section('content')
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
        <div class="bg-white overflow-hidden sm:rounded-lg"
            style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">

            <form action="{{route('detallecompra.store')}}" method="POST"
                  class="p-4 space-y-4"> <!-- Agregamos padding y espacio vertical entre elementos -->
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="compra" class="block text-gray-700 text-sm font-bold mb-2">Compra ID</label>
                        <input type="text" name="compra" id="compra"
                               class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required
                               oninput="ConvertirPrimeraLetra(this)">
                    </div>
                    <div>
                        <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                        <input type="text" name="precio" id="precio"
                               class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required
                               oninput="ConvertirPrimeraLetra(this)">
                    </div>
                    <div>
                        <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                        <input type="text" name="cantidad" id="cantidad"
                               class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required
                               oninput="ConvertirPrimeraLetra(this)">
                    </div>
                    <div>
                        <label for="subtotal" class="block text-gray-700 text-sm font-bold mb-2">Subtotal</label>
                        <input type="text" name="subtotal" id="subtotal"
                               class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required
                               oninput="ConvertirPrimeraLetra(this)">
                    </div>

                    <div>
                        <label for="producto" class="block text-gray-700 text-sm font-bold mb-2"></label>Producto
                        <input type="text" name="producto" id="producto"
                               class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required
                               oninput="ConvertirPrimeraLetra(this)">
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
                        <h2 class="text-2xl font-semibold ml-4">Detalle Compra</h2>

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
                                    Forma de pago</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                Fecha</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                Hora</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                Total</th>
                                <th
                                    class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                Proveedor</th>

                            </tr>
                        </thead>
                        @foreach ($detallecompra as $e)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->compra_id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->precio }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->cantidad }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->subtotal }}</td>

                            <td class="px-6 py-4 whitespace-no-wrap">{{ $e->producto_id }}</td>
                        @endforeach
                    </table
                </div>
            </div>
        </div>
    </div>
@endsection

