{{-- @extends('layouts.app') --}}
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
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 h-[100vh] max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="text-gray-900 overflow-auto">
                <div class="space-x-4  font-semibold mt-2">
                    {{-- <a href="#">Exportar</a>
                    <a href="#">Importar</a> --}}
                    <a href="{{ route('producto.create') }}"
                        class="bg-gray-500  hover:bg-gray-700  text-white font-bold py-1 px-3 rounded ml-1 mt-1">
                        Agregar producto
                    </a>
                </div>
                <form action="{{ route('producto.index') }}" method="GET">
                    <div class="mt-2 mb-3">
                        <div class="relative mb-1 flex w-full flex-wrap items-stretch">
                            <input type="text" name="buscar"
                                class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                placeholder="Escribe" value="{{ $buscar }}" aria-label="Search"
                                aria-describedby="button-addon1" />

                            <!--Search button-->
                            <button
                                class="type=submit relative z-[2] flex items-center rounded-r bg-gray-500 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-700 active:shadow-lg"
                                type="submit" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                        </div>
                    </div>
                </form>
                <table class="table-auto w-full ">
                    <div class="text-center mt-0">
                        <a class="text-1xl font-mono font-semibold text-gray-500">LISTA DE PRODUCTOS</a>
                    </div>
                    <thead>
                        <tr class="text-xs text-left font-semibold text-gray-500  ">
                            <th class="py-3    "> Nro</th>
                            <th class="px-8 py-3 ">foto</th>
                            <th class="px-4 py-3 ">Producto</th>
                            <th class=" py-3 "> Codigo </th>
                            <th class="pl-4 py-3 text-left ">autor</th>
                            <th class="pl-4 py-3 text-left ">Editorial</th>
                            <th class="pl-8 py-3 text-right ">Stock</th>
                            <th class="px-1 py-3 "></th>
                            <th class="pl-4 py-3 text-center ">Precio</th>
                            <th class="pl-4 py-3 text-center ">Ubicacion</th>

                            <th class="pl-8 py-3 text-right ">Acciones </th>
                        </tr>
                    </thead>

                    <tbody class=" ">
                        @php
                            $productosCoincidentes = [];
                            $productosNoCoincidentes = [];
                        @endphp

                        @foreach ($producto as $p)
                            @if (strpos(strtolower($p->nombre), strtolower($buscar)) !== false ||
                                    strpos(strtolower($p->codigo), strtolower($buscar)) !== false)
                                @php
                                    $productosCoincidentes[] = $p;
                                @endphp
                            @else
                                @php
                                    $productosNoCoincidentes[] = $p;
                                @endphp
                            @endif
                        @endforeach
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($productosCoincidentes as $p)
                            <tr
                                class=" bg-white text-gray-700  hover:border-white
                         hover:bg-gray-100 transition">
                                <td>
                                    <p class=" text-normal text-center">{{ $i }} </p>
                                </td>
                                <td class="px-8 py-3 text-sm capitalize ">
                                    <img src="/imagen/{{ $p->imagen }}" class="w-12 h-12 rounded mx-auto" alt="">
                                </td>
                                <td class="px-4 py-3 text-sm capitalize "> {{ $p->nombre }} </td>
                                <td class=" py-3 text-sm capitalize ">{{ $p->codigo }}</td>
                                <td class="pl-4 py-3 text-sm text-left">{{ $p->autor }}</td>
                                <td class="pl-4 py-3 text-sm text-left">{{ $p->editorial }}</td>
                                <td class="pl-4 py-3 text-sm text-right">{{ $p->cantidad }} Pzs
                                <td>
                                <td class="pl-4 py-3 text-sm text-right ">{{ $p->precio }} Bs</td>
                                <td class="px-4 py-3 text-sm text-right ">{{ $p->ubicacion }}</td>

                                <td class=" ">
                                    <div class="flex ml-4  justify-end text-right  ">
                                        {{-- @can('cotizacion.edit') --}}
                                        <div class="flex justify-center">
                                            <a title="EDITAR" type="button" href="{{ route('producto.edit', $p->id) }}"
                                                class="   rounded-lg w-fit p-2 mx-2 text-white
                                        hover:scale-125 transition-transform delay-75">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-6 h-6 text-blue-800">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>

                                        </div>
                                        {{-- @endcan --}}
                                        {{-- @can('cotizacion.destroy') --}}
                                        <div>
                                            <form action="{{ route('producto.destroy', $p->id) }}" method="POST">
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
                        @endforeach

                        @foreach ($productosNoCoincidentes as $p)
                            <tr
                                class=" bg-white text-gray-700  hover:border-white
                         hover:bg-gray-100 transition">
                                <td>
                                    <p class=" text-normal text-center">{{ $i }} </p>
                                </td>
                                <td class="px-8 py-3 text-sm capitalize ">
                                    <img src="/imagen/{{ $p->imagen }}" class="w-12 h-12 rounded mx-auto"
                                        alt="">
                                </td>
                                <td class="px-4 py-3 text-sm capitalize "> {{ $p->nombre }} </td>
                                <td class=" py-3 text-sm capitalize ">{{ $p->codigo }}</td>
                                <td class="pl-4 py-3 text-sm text-left">{{ $p->autor }}</td>
                                <td class="pl-4 py-3 text-sm text-left">{{ $p->editorial }}</td>
                                <td class="pl-4 py-3 text-sm text-right">{{ $p->cantidad }} Pzs
                                <td>
                                <td class="pl-4 py-3 text-sm text-right ">{{ $p->precio }} Bs</td>
                                <td class="px-4 py-3 text-sm text-right ">{{ $p->ubicacion }}</td>

                                <td class=" ">
                                    <div class="flex ml-4  justify-end text-right  ">
                                        {{-- @can('cotizacion.edit') --}}
                                        <div class="flex justify-center">
                                            <a title="EDITAR" type="button" href="{{ route('producto.edit', $p->id) }}"
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
                                        {{-- @endcan --}}
                                        {{-- @can('cotizacion.destroy') --}}
                                        <div>
                                            <form action="{{ route('producto.destroy', $p->id) }}" method="POST">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
