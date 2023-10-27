@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto my-5 p-6"
        style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); font-family: 'Verdana', sans-serif; margin-bottom: 1px;">
        <button id="volverButton" class="bg-indigo-300 text-white rounded-md px-2 py-1 text-xs hover:bg-indigo-600 inline-flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Volver
        </button>
        <script>
            document.getElementById("volverButton").addEventListener("click", function() {
                window.location.href = "{{ route('admin.roles.index') }}";
            });
        </script>
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store'])!!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre del Rol:', ['class' => 'text-lg font-medium text-gray-600']) !!}
                    {!! Form::text('name', null, ['class' => 'w-full p-2 border rounded-md mt-1 text-black', 'placeholder' => 'Ingrese el nombre del rol']) !!}
                    @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>
                <h2 class="h3 mt-4 mb-2 text-lg font-medium text-gray-600">Lista de Permisos</h2>
                @foreach ($permissions as $permission)
                    <div class="flex items-center mt-2">
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'h-5 w-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-400']) !!}
                        <span class="ml-2 text-gray-800">{{$permission->description}}</span>
                    </div>
                @endforeach
                <div class="text-center">
                {!! Form::submit('Crear Rol', ['class' => 'bg-indigo-500 text-white rounded-md p-2 mt-4 hover:bg-indigo-600']) !!}
                </div>
            {!! Form::close()!!}

        </div>
    </div>
</div>
@endsection


