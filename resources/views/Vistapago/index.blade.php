@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="py-2">
        <div class="flex justify-between items-center">
            @if (session('success'))
                <div class="text-center">
                    <p class="text-white py-1 px-2 sm:py-2 sm:px-4 bg-lime-500 text-xs sm:text-sm rounded-xl">
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-8xl mx-auto bg-white rounded-lg shadow-md">
            <div class="p-6">
                <p class="text-1xl font-semibold mb-2">VER TIPOS DE PAGO REALIZADOS</p>
                <form action="{{ route('pago.index') }}" method="GET">
                    @csrf
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="formapago" class="text-sm font-bold mb-0">Método de Pago</label>
                            <select name="formapago" id="formapago" class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Qr">Qr</option>
                                <option value="Tarjeta">Tarjeta</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                                    class="bg-blue-500  hover:bg-blue-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                                    Filtrar
                    </button>

                </form>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-8xl mx-auto bg-white rounded-lg shadow-md">
            <div class="p-6">
                <p class="text-1xl font-semibold mb-2">VENTAS</p>

                @if(isset($formapagoSeleccionado))
                    @if(count($ventas) > 0)
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th>ID de Venta</th>
                                    <th>Método de Pago</th>
                                    <th>ID del Cliente</th>
                                    <th>Nombre del Cliente</th>
                                    <!-- Agrega más columnas según sea necesario -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ventas as $venta)
                                    @if ($venta->formapago === $formapagoSeleccionado)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            <td>{{ $venta->formapago }}</td>
                                            <td>{{ $venta->cliente_id }}</td>
                                            <td>{{ $venta->cliente->nombre }}</td>
                                            <!-- Agrega más celdas según sea necesario -->
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay ventas disponibles para el método de pago seleccionado.</p>
                    @endif
                @else
                    <p>No hay ventas disponibles.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
