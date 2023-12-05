@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-2 px-18 h-full ">
        <div class=" flex justify-between items-center ">
            <H1></H1>
            @if (session('success'))
                <div class="text-center">
                    <p class="text-white py-1 px-2 sm:py-2 sm:px-4 bg-lime-500 text-xs sm:text-sm rounded-xl">
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        </div>

        <div class="py-1">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 h-[100vh] max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-gray-900 overflow-auto">
                    <div class="mt-2">
                        <a href="{{ route('venta.pdf', ['start_date' => $start_date, 'end_date' => $end_date]) }}" target="_blank"
                            class="bg-red-500  hover:bg-red-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                            PDF
                        </a>
                        <a onclick="imprimirVenta()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                            Imprimir
                        </a>
                    </div>

                    <div class="space-x-4  font-semibold mt-2">

                        <div class="text-center mt-4">
                            <a class="text-1xl font-mono font-semibold text-gray-500">REPORTE DE VENTAS</a>
                        </div>
                    </div>
                    <form action="{{ route('venta.reporte') }}" method="GET">
                        <div class="flex items-center space-x-4 mb-6">

                            <div class="w-1/2">
                                <label for="start_date" class="text-gray-600 font-semibold text-sm">Fecha de inicio:</label>
                                <input type="date" id="start_date" name="start_date"
                                    class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                    value="{{ $start_date ?? '' }}">
                            </div>
                            <div class="w-1/2">
                                <label for="end_date" class="text-gray-600 font-semibold text-sm">Fecha de fin:</label>
                                <input type="date" id="end_date" name="end_date"
                                    class="px-4 py-2 w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                    value="{{ $end_date ?? '' }}">
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                    class="bg-blue-500  hover:bg-blue-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                                    Filtrar
                                </button>
                            </div>
                        </div>
                    </form>

                    <table class="table-auto w-full">
                        <thead>
                            <tr class="text-xs text-left font-semibold text-gray-500">
                                <th class="px-2 py-3 text-center">Nro</th>
                                <th class="px-4 py-3 text-center">Tipo de pago</th>
                                <th class="px-4 py-3 text-center">CI</th>
                                <th class="px-6 py-3 text-center">Cliente</th>
                                <th class="px-8 py-3 text-center">Fecha</th>
                                <th class="px-1 py-3 text-center"></th>
                                <th class="px-1 py-3 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($venta as $v)
                                <tr class="bg-white text-gray-700 hover:border-white hover:bg-gray-100 transition">
                                    <td class="py-3 text-sm text-center">{{ $v->id }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->formapago }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->cliente_id }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->cliente->nombre }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->created_at->format('Y-m-d') }}</td>


                                    <td class=" ">
                                        <div class="flex ml-4  justify-end text-right  ">
                                            {{-- @can('cotizacion.edit') --}}
                                            <div class="flex justify-center">
                                                <a title="EDITAR" type="button" href="{{ route('detalleventa.index',['venta_id' => $v->id])}}"
                                                    class="   rounded-lg w-fit p-2 mx-2 text-white
                                            hover:scale-125 transition-transform delay-75">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-6 h-6 text-blue-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>

                                            </div>
                                            <div class="flex justify-center">
                                                <a title="VER" type="button" href="{{ route('detalleventa.verdetalle', $v->id) }}"
                                                    class="rounded-lg w-fit p-2 mx-2 text-white hover:scale-125 transition-transform delay-75">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="24" viewBox="0 0 576 512" fill="red">
                                                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            {{-- @endcan --}}
                                            {{-- @can('cotizacion.destroy') --}}
                                            <div>
                                                @can('Gestionarventa.detroy')
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="text" name="id" class="hidden" value="">
                                                    {{-- <input type="submit" value="ELIMINAR" class=""
                                                    onclick="return confirm('Desea Eliminar?')"> --}}
                                                    <button type="submit" title="ELIMINAR"
                                                        class="w-fit py-2   rounded-lg text-white
                                                      hover:scale-125 transition-transform delay-75"
                                                        onclick="return confirm('Desea Eliminar?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-6 h-6 text-red-600">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                @endcan
                                            </div>
                                            {{-- @endcan --}}

                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function imprimirVenta() {
        // Obtener las celdas de la tabla que se quieren imprimir
        var filas = document.getElementsByTagName('table')[0].rows;
        var contenido = '<html><head><title>Reporte de Ventas</title>';
        contenido += '<style>';
        contenido += 'body { font-family: Arial, sans-serif; margin: 0; }';
        contenido += 'table { width: 100%; border-collapse: collapse; font-size: 12px; }';
        contenido += 'th, td { padding: 6px; text-align: center; }';
        contenido += 'th { background-color: #f2f2f2; }';
        contenido += '</style>';
        contenido += '</head><body>';

        // Crear una tabla nueva con las columnas que se quieren imprimir
        contenido += '<table>';
        contenido += '<thead>';
        contenido += '<tr>';
        contenido += '<th style="width: 10%;">Nro</th>';
        contenido += '<th style="width: 20%;">Tipo de pago</th>';
        contenido += '<th style="width: 15%;">CI</th>';
        contenido += '<th style="width: 25%;">Cliente</th>';
        contenido += '<th style="width: 20%;">Fecha</th>';
        contenido += '</tr>';
        contenido += '</thead>';
        contenido += '<tbody>';

        // Iterar sobre cada fila de la tabla y obtener las celdas requeridas
        for (var i = 0; i < filas.length; i++) {
            var celdas = filas[i].getElementsByTagName('td');
            if (celdas.length > 0) {
                contenido += '<tr>';
                contenido += '<td>' + celdas[0].innerText + '</td>'; // Nro
                contenido += '<td>' + celdas[1].innerText + '</td>'; // Tipo de pago
                contenido += '<td>' + celdas[2].innerText + '</td>'; // CI
                contenido += '<td>' + celdas[3].innerText + '</td>'; // Cliente
                contenido += '<td>' + celdas[4].innerText + '</td>'; // Fecha
                contenido += '</tr>';
            }
        }

        contenido += '</tbody>';
        contenido += '</table>';
        contenido += '</body></html>';

        // Crear una nueva ventana para la impresión
        var ventanaImpresion = window.open('', '_blank');
        ventanaImpresion.document.open();
        ventanaImpresion.document.write(contenido);
        ventanaImpresion.document.close();

        // Imprimir el contenido de la ventana abierta
        ventanaImpresion.print();
    }
</script>


