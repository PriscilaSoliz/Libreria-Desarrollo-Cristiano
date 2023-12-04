@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-1">
        <div class="max-w-8x2 mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg">
                <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
                    <form id="ventaForm" action="{{ route('detalleventa.store') }}" method="POST">
                        @csrf
                        {{-- @if (isset($venta))
                            <p name="venta_id" id="venta_id" class="text-1xl font-semibold mb-2">
                                {{ $venta->id }}</p>
                            <!-- Aquí puedes mostrar otros detalles de la venta -->
                        @endif --}}
                        @if (isset($venta))
                            <label>Nota de Venta: </label>
                            <input type="texto" name="venta_id" id="venta_id" value="{{ $venta->id }}">
                        @endif
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="idLabel" class="text-sm font-bold mb-0" id="idLabel"></label>
                                <label for="formapago" class="text-sm font-bold mb-0">Codigo: </label>
                                <input type="text" id="searchInput"
                                    class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400 mb-2"
                                    placeholder="Buscar...">
                                <select name="codigo_id" id="codigo_id"
                                    class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    required onchange="actualProducto()">
                                    @foreach ($producto as $p)
                                        <option value="{{ $p->id }}" data-precio="{{ $p->precio }}"
                                            data-id="{{ $p->id }}" data-nombre="{{ $p->nombre }}">
                                            {{ $p->codigo }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div>
                                <label for="" class="text-sm font-bold mb-0">Producto</label>
                                <select name="producto_id" id="producto_id"
                                    class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    required onchange="actualizarPrecioYCantidad()">
                                    @foreach ($producto as $p)
                                        <option value="{{ $p->id }}" data-precio="{{ $p->precio }}"
                                            data-id="{{ $p->id }}">{{ $p->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 mt-4">
                            <div>
                                <label for="" class="text-sm font-bold mb-0">Precio</label>
                                <input type="text" name="precio" id="precio"
                                    class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div>
                                <label for="" class="text-sm font-bold mb-0">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad"
                                    class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div>
                                <label for="" class="text-sm font-bold mb-0">Subtotal</label>
                                <input type="text" name="subtotal" id="subtotal"
                                    class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                    readonly>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="update_button" value=""
                                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-1 px-3 rounded mt-4 sm:py-1 sm:px-2 sm:text-sm">Aceptar</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-8x2 mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg">
                <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
                    <div style="overflow-x: auto;">
                        <div>
                            <a href="{{ route('detalleventa.pdf', ['venta_id' => $venta->id]) }}"
                            target="_blank"
                            class="bg-red-500  hover:bg-red-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">PDF</a>
                            <a href="{{ route('detalleventa.pdfqr') }}"
                                target="_blank"
                                class="bg-red-500  hover:bg-red-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">Qr</a>
                        </div>
                        <table class="table-auto w-full ">
                            <thead>
                                <tr class="text-xs text-left font-semibold text-gray-500  ">
                                    <th class="py-3    "> Nro Venta</th>
                                    <th class="px-8 py-3 ">Nro</th>
                                    <th class="px-4 py-3 ">foto</th>
                                    <th class="px-4 py-3 text-left "> Producto </th>
                                    <th class="pl-4 py-3 text-left ">Codigo</th>
                                    <th class="pl-4 py-3 text-right ">Precio</th>
                                    <th class="pl-8 py-3 text-right ">Cantidad </th>
                                    <th class="pl-8 py-3 text-left ">Subtotal</th>
                                    {{-- <th class="px-8 py-3 ">Precio de compra </th> --}}
                                    {{-- <th class="pl-8 py-3 text-right ">Acciones </th> --}}
                                </tr>
                            </thead>

                            <tbody class=" ">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($detalleventa as $v)
                                    <td style="display: none;">
                                        <p class="text-normal text-center">{{ $v->id }}</p>
                                    </td>
                                    @if ($v->venta_id && $venta && $v->venta_id == $venta->id)
                                        <tr
                                            class=" bg-white text-gray-700  hover:border-white
                                 hover:bg-gray-100 transition">
                                            <td>
                                                <p class=" text-normal text-center">{{ $v->venta_id }} </p>
                                            </td>
                                            <td>
                                                <p class=" text-normal text-center">{{ $i }} </p>
                                            </td>
                                            <td class="px-4 py-3 text-sm capitalize ">

                                                <img src="/imagen/{{ $v->producto->imagen }}"
                                                    class="w-12 h-12 rounded mx-auto" alt="">

                                            </td>
                                            <td class="px-4 py-3 text-sm capitalize ">{{ $v->producto->nombre }} </td>

                                            <td class="py-3 text-sm capitalize">
                                                {{ $v->producto->codigo }}
                                            </td>

                                            {{-- <td class="px-4 py-3 text-sm capitalize  ">
                                                <p class="w-fit rounded-2xl p-1 px-3 border bg-green-200 text-green-700">

                                                </p>
                                            </td> --}}
                                            <td class="pl-4 py-3 text-sm text-right ">{{ $v->precio }}Bs</td>
                                            <td class="px-4 py-3 text-sm text-right ">{{ $v->cantidad }}</td>
                                            {{-- <td class="px-4 py-3 text-sm text-right ">{{ $v->descuento }}</td> --}}
                                            <td class="px-4 py-3 text-sm text-right ">{{ $v->subtotal }}</td>
                                            <td class=" ">
                                                <div>
                                                    <form action="{{ route('detalleventa.destroy', $v->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" title="ELIMINAR"
                                                            class="w-fit py-2   rounded-lg text-white
                                                      hover:scale-125 transition-transform delay-75"
                                                            onclick="return confirm('Deseas Eliminar?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" class="w-6 h-6 text-red-600">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().trim();
            $('#codigo_id option').each(function() {
                var optionText = $(this).text().trim();
                var showOption = optionText.startsWith(searchText);
                $(this).toggle(showOption);
            });
        });

        $('#codigo_id').change(function() {
            actualizarProducto();
        });

        $('#producto_id').change(function() {
            actualizarPrecioYCantidad();
        });

        $('#cantidad, #precio').on('input', function() {
            calcularSubtotal();
        });
    });

    function actualProducto() {
        var selectedOption = $('#codigo_id option:selected');
        $('#producto_id').val(selectedOption.data('id'));
        $('#producto_id').trigger('change'); // Forzar el cambio para actualizar precio y cantidad
        $('#precio').val(selectedOption.data('precio')); // Actualizar precio automáticamente
        calcularSubtotal(); // Calcular el subtotal automáticamente
    }

    function actualizarProducto() {
        var codigoSeleccionado = document.getElementById("codigo_id");
        var idLabel = document.getElementById("idLabel");

        // Obtener el valor del ID del código seleccionado en el select
        var selectedId = codigoSeleccionado.options[codigoSeleccionado.selectedIndex].getAttribute('data-id');

        // Actualizar el contenido del label con el ID seleccionado
        idLabel.textContent = selectedId;
    }

    function actualizarPrecioYCantidad() {
        var selectedOption = $('#producto_id option:selected');
        $('#precio').val(selectedOption.data('precio'));
        calcularSubtotal(); // Calcular el subtotal automáticamente
    }

    function calcularSubtotal() {
        var precio = parseFloat($('#precio').val()) || 0;
        var cantidad = parseFloat($('#cantidad').val()) || 0;
        var subtotal = precio * cantidad;

        $('#subtotal').val(subtotal.toFixed(2));
    }
</script>
