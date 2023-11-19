@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
            <div class="bg-white overflow-hidden sm:rounded-lg"
                style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.7); margin-top: 20px; font-family: 'Verdana', sans-serif;">

                <form action="{{ route('detalleventa.store') }}" method="POST" class="p-4 space-y-4">
                    @csrf
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="venta_id" class="block text-gray-700 text-sm font-bold mb-2">Venta ID</label>
                            <select name="venta_id" id="venta_id"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                                @foreach ($venta as $p)
                                    <option value="{{ $p->id }}">{{ $p->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="producto_id" class="block text-gray-700 text-sm font-bold mb-2">Producto</label>
                            <select name="producto_id" id="producto_id"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                onchange="actualizarPrecioYID()">
                                @foreach ($producto as $p)
                                    <option value="{{ $p->id }}" data-precio="{{ $p->precio }}"
                                        data-id="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                            <input type="text" name="precio" id="precio"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required oninput="actualizarSubtotal()">
                        </div>

                        <div>
                            <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required oninput="actualizarSubtotal()">
                        </div>
                        <div>
                            <label for="descuento" class="block text-gray-700 text-sm font-bold mb-2">Descuento</label>
                            <input type="number" name="descuento" id="cantdescuentoidad"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                oninput="actualizarSubtotal()">
                        </div>

                        <div>
                            <label for="subtotal" class="block text-gray-700 text-sm font-bold mb-2">Subtotal</label>
                            <input type="text" name="subtotal" id="subtotal"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required>
                        </div>

                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Añadir</button>
                    </div>

                    <script>
                        function actualizarSubtotal() {
                            var precioInput = document.getElementById('precio');
                            var cantidadInput = document.getElementById('cantidad');
                            var subtotalInput = document.getElementById('subtotal');

                            // Obtener los valores de precio y cantidad
                            var precio = parseFloat(precioInput.value) || 0;
                            var cantidad = parseInt(cantidadInput.value) || 0;

                            // Calcular el subtotal
                            var subtotal = precio * cantidad;

                            // Actualizar el campo de subtotal
                            subtotalInput.value = subtotal.toFixed(2); // Asegura dos decimales en el resultado
                        }

                        function actualizarPrecioYID() {
                            var productoSelect = document.getElementById('producto_id');
                            var precioInput = document.getElementById('precio');
                            var idInput = document.getElementById('producto_id'); // Supongo que también tienes un campo de ID

                            // Obtener el precio y el ID del producto seleccionado
                            var precio = productoSelect.options[productoSelect.selectedIndex].getAttribute('data-precio');
                            var id = productoSelect.options[productoSelect.selectedIndex].getAttribute('data-id');

                            // Actualizar los campos de precio y ID
                            precioInput.value = precio;
                            idInput.value = id;
                        }
                    </script>
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
                        <h2 class="text-2xl font-semibold ml-4">Detalle Venta</h2>

                    </div>
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full divide-y divide-gray-300 mt-4">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                        venta Id</th>
                                        <th
                                        class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider">
                                        Producto</th>
                                    <th
                                        class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                        Precio</th>
                                    <th
                                        class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                        Cantidad</th>
                                        <th
                                        class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                        Descuento</th>
                                    <th
                                        class="px-1 py-3 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-500 uppercase tracking-wider ">
                                        Total</th>


                                </tr>
                            </thead>
                            @foreach ($detalleventa as $e)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->venta->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->producto->nombre }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->precio }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->cantidad }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->descuento }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $e->subtotal }}</td>


                            @endforeach
                        </table </div>
                    </div>
                </div>
            </div>
        @endsection
