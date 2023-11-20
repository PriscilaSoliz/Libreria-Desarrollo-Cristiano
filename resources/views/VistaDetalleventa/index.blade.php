@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg">
                <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">

                    @if (isset($venta))
                        <p class="text-1xl font-semibold mb-2">Nota de Venta: {{ $venta->id }}</p>

                        <!-- Aquí puedes mostrar otros detalles de la venta -->
                    @endif
                    {{-- <p class="text-1xl font-semibold mb-2">REGISTRAR VENTA</p> --}}
                    {{-- <form id="ventaForm" action="{{ route('venta.store') }}" method="POST">
                        @csrf --}}

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="formapago" class="text-sm font-bold mb-0">Codigo</label>
                            <input type="text" id="searchInput"
                                class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400 mb-2"
                                placeholder="Buscar...">
                            <select name="codigo_id" id="codigo_id"
                                class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required onchange="actualizarProducto()">
                                @foreach ($producto as $p)
                                    <option value="{{ $p->id }}" data-precio="{{ $p->precio }}"
                                        data-id="{{ $p->id }}" data-nombre="{{ $p->nombre }}">{{ $p->codigo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="formapago" class="text-sm font-bold mb-0">Producto</label>
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
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="" class="text-sm font-bold mb-0">Cantidad</label>
                            <input type="text" name="cantidad" id="cantidad"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label for="" class="text-sm font-bold mb-0">Subtotal</label>
                            <input type="text" name="subtotal" id="subtotal"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                        </div>

                    </div>



                    <div>
                        <button type="submit" name="update_button" value=""
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded ml-1 mt-4 sm:py-1 sm:px-2 sm:text-sm">Aceptar</button>
                    </div>
                </div>

                {{-- </form> --}}


            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var searchText = $(this).val().toLowerCase();
            $('#producto_id option').each(function() {
                var optionText = $(this).text().toLowerCase();
                var showOption = optionText.startsWith(searchText);
                $(this).toggle(showOption);
            });
        });
    });

    function actualizarProducto() {
        var selectedOption = $('#codigo_id option:selected');
        $('#producto_id').val(selectedOption.data('id'));
        $('#precio').val(selectedOption.data('precio'));
        // Aquí puedes colocar lógica adicional para actualizar otros campos según el producto seleccionado
    }
    $(document).ready(function() {
        $('#cantidad, #precio').on('input', function() {
            calcularSubtotal();
        });
    });
    function calcularSubtotal() {
        var precio = parseFloat($('#precio').val()) || 0;
        var cantidad = parseFloat($('#cantidad').val()) || 0;
        var subtotal = precio * cantidad;

        $('#subtotal').val(subtotal.toFixed(2));
    }
</script>
