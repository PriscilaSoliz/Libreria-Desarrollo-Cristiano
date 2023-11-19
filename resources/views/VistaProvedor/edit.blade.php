@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blanco desbordamiento-sombra oculta-sm sm:redondeado-lg p-6"> <button id="volverButton"
                    class="bg-indigo-300 texto-blanco redondeado-md px-2 py -1 texto-xs hover:bg-indigo-600 inline-flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w- 3 mr-1" fill="none" viewBox="0 0 24 24"
                        trazo="currentColor">
                        <ruta trazo-linecap="redondo" trazo-linejoin="redondo" trazo-width="2"
                            d=" M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg> Volver </button>
                <script>
                    document.getElementById("volverButton").addEventListener("click", function() {
                        window.location.href = "{{ ruta('producto.index') }}";
                    });
                </script>
                <h2 class="text-2xl font-semibold mb-4">Editar Producto</h2>
                <form action="{{ route('producto.update', $producto->id) }}" método="POST"> @csrf @method('PUT')
                    <!-- Indica que esta es una solicitud PUT para actualizar -->
                    <div class="grid grid-cols-2 gap-4">
                        <div> <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código</label> <input
                                type="text" name="codigo" id="codigo" valor ="{{ $producto->codigo }}"
                                class="borde redondeado-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div> <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre
                                Producto</label> <input type="text" name="nombre" id="nombre"
                                value="{{ $producto->nombre }}" class="borde redondeado-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:
@endsection
