
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
                        {{-- <a href="{{ route('venta.pdf', ['start_date' => $start_date, 'end_date' => $end_date]) }}" target="_blank"
                            class="bg-red-500  hover:bg-red-700  text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                            PDF
                        </a> --}}
                        {{-- <a onclick="imprimirVenta()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded ml-1 mt-1">
                            Imprimir
                        </a> --}}
                    </div>

                    <div class="space-x-4  font-semibold mt-2">
                        <div class="text-center mt-4">
                            @if (isset($venta))
                            <label>Nota de Venta: </label>
                            <input type="texto" name="venta_id" id="venta_id" value="{{ $venta->id }}">
                        @endif
                        </div>
                    </div>
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
                            @foreach ($detalleventa as $v)
                            @if ($v->venta_id && $venta && $v->venta_id == $venta->id)
                                <tr class="bg-white text-gray-700 hover:border-white hover:bg-gray-100 transition">
                                    <td class="py-3 text-sm text-center">{{$v->id }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->producto->nombre }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->precio }} Bs</td>
                                    <td class="py-3 text-sm text-center">{{ $v->cantidad }}</td>
                                    <td class="py-3 text-sm text-center">{{ $v->subtotal}}</td>
                                    <td class=" ">
                                        <div class="flex ml-4  justify-end text-right  ">
                                            <div>
                                                <form action="{{ route('detalleventa.eliminar', $v->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
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
                                            </div>
                                            {{-- @endcan --}}

                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
