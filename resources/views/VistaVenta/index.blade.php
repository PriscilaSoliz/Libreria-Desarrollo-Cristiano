@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-4">
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
        <div class="max-w-8x1 mx-auto bg-white rounded-lg shadow-md">
            <div class="p-6">
                <p class="text-1xl font-semibold mb-2">REGISTRAR CLIENTE</p>
                <form id="clienteForm" action="{{ route('cliente.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="ci" class="text-sm font-bold mb-0">CI/NIT</label>
                            <input type="number" name="ci" id="ci"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required value="{{ old('ci') }}"> <!-- Aquí se agrega el método old() -->
                        </div>
                        <div>
                            <label for="nombre" class="text-sm font-bold mb-0">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required oninput="convertirPrimeraLetra(this)" value="{{ old('nombre') }}">
                            <!-- Método old() para mantener el valor anterior -->
                        </div>
                        <div>
                            <label for="celular" class="text-sm font-bold mb-0">Celular</label>
                            <input type="number" name="celular" id="celular"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                value="{{ old('celular') }}"> <!-- Método old() para mantener el valor anterior -->
                        </div>
                        <div>
                            <label for="direccion" class="text-sm font-bold mb-0">Dirección</label>
                            <input type="text" name="direccion" id="direccion"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                oninput="convertirPrimeraLetra(this)" value="{{ old('direccion') }}">
                            <!-- Método old() para mantener el valor anterior -->
                        </div>
                    </div>
                    <div class="mt-2 text-left">
                        <button type="submit" name="update_button" value="entradacliente"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded ml-1 mt-1 sm:py-1 sm:px-2 sm:text-sm">Registrar</button>
                    </div>

                </form>
            </div>

            <div class="p-6 -mt-12">
                <p class="text-1xl font-semibold mb-2">REALIZAR VENTA DEL CLIENTE</p>
                <form id="ventaForm" action="{{ route('venta.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="ci" class="text-sm font-bold mb-0">CI/NIT</label>
                            <input type="number" name="ci" id="ci"
                                class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required value="{{ old('ci') }}"> <!-- Aquí se agrega el método old() -->
                        </div>
                        <div>
                            <label for="formapago" class="text-sm font-bold mb-0">Metodo de Pago</label>
                            <select name="formapago" id="formapago"
                                class="border rounded-lg py-1 px-1 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Qr">Qr</option>
                                <option value="Tarjeta">Tarjeta</option>
                            </select>
                        </div>
                        {{-- <div>
                        <input type="hidden" name="ci" id="ci"
                            class="border rounded-lg py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required value="{{ old('ci') }}"> <!-- Aquí se agrega el método old() -->
                    </div> --}}
                        <div class=" text-left">
                            <button type="submin" name="update_button" value="entradacliente"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded ml-1  sm:py-1 sm:px-2 sm:text-sm">Aceptar</button>
                        </div>
                    </div>
                </form>
                {{-- <div class="mt-2 text-left">
                <!-- Botón para enviar ambos formularios -->
                <button id="enviarAmbosFormularios" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded ml-1 mt-1 sm:py-1 sm:px-2 sm:text-sm">Guardar</button>
            </div> --}}
            </div>
        </div>
    </div>


    <script>
        function convertirPrimeraLetra(input) {
            input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                return a.toUpperCase();
            });
        }
        document.getElementById('enviarAmbosFormularios').addEventListener('click', function() {
            // Capturar los formularios por sus IDs
            var clienteForm = document.getElementById('clienteForm');
            var ventaForm = document.getElementById('ventaForm');

            // Enviar ambos formularios al hacer clic en el botón
            clienteForm.submit();
            ventaForm.submit();
        });
        
    </script>
@endsection
