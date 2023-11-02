@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="shadow-lg sm:rounded-lg">
            <div class="bg-white overflow-hidden p-6 border rounded-lg" style="font-family: 'Verdana', sans-serif;">
                <h2 class="text-2xl font-semibold mb-4">Nueva Categoria</h2>
                <form action="{{route('categoria.store')}}" method="POST" >
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Categoria</label>
                            <input type="text" name="descripcion" id="descripcion" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required oninput="ConvertirPrimeraLetra(this)">
                            <script>
                                function ConvertirPrimeraLetra(input) {
                                  input.value = input.value.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                                    return a.toUpperCase();
                                  });
                                }
                                </script>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
