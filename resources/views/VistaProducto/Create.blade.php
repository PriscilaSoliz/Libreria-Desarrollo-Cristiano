@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg sm:rounded-lg bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
                <p class="text-center font-semibold mb-4">Crear Producto</p>
                <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 mx-7">
                    @csrf
                    <!-- Inputs simplificados usando clases de Tailwind CSS -->
                    <input type="text" name="codigo" id="codigo" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="Codigo">
                    <input type="text" name="nombre" id="nombre" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="Nombre Producto">
                    <input type="text" name="autor" id="autor" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Autor">
                    <input type="text" name="version" id="version" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Version">
                    <input type="text" name="editorial" id="editorial" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="Editorial">
                    <input type="number" name="precio" id="precio" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="Precio">
                    <input type="number" name="cantidad" id="cantidad" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="Cantidad">
                    <input type="text" name="ubicacion" id="ubicacion" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required placeholder="Ubicacion">

                    <!-- Dropdowns -->
                    <select name="proveedor_id" id="proveedor_id" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach ($provedor as $p)
                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                        @endforeach
                    </select>
                    <select name="categoria_id" id="categoria_id" class="border rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach ($categoria as $c)
                            <option value="{{ $c->id }}">{{ $c->descripcion }}</option>
                        @endforeach
                    </select>
                    <div class="grid grid-cols-1 mt-0 mx-16">
                        <img id="imagenSeleccionada" style="max-height: 200px;">
                    </div>
                    <!-- Botón de imagen -->
                    <div class="flex items-center justify-center w-full">

                        <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">

                            <div class="flex flex-col items-center justify-center pt-7">
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-center text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider">Seleccione la imagen</p>
                            </div>
                            <input name="imagen" id="imagen" type="file" class="hidden" />
                        </label>
                        <!-- Botones -->
                    <div class="flex items-center justify-center ml-4  md:gap-8 gap-4 pt-5 pb-5">
                        <a href="{{ route('producto.index') }}" class="w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">Cancelar</a>
                        <button type="submit" class="w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">Guardar</button>
                    </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('#imagen').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
