@extends('adminlte::page')
@vite(['resources/css/app.css', 'resources/js/app.js'])


@section('content')
<div class="py-4 flex flex-col md:flex-row">
    <div class="w-full md:w-1/4 p-4 border border-gray-300 shadow-md bg-white mb-4 md:mb-0">
        <!-- Contenido del primer div -->

                <p class="h5">Nombre: {{ $user->name }}</p>
                <p class="h5">Correo: {{ $user->email }}</p>
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                <div class="form-group">
                    <label for="roles">Roles:</label>

                    @foreach ($roles as $role)
                        <div class="mt-2">
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, $user->hasRole($role), ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-4">
                    <button type="submit" name="submit_button" value="asignar_rol"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Asignar Rol
                    </button>
                </div>
                {!! Form::close() !!}

    </div>
    <div class="w-full md:w-3/4 p-4 border border-gray-300 shadow-md bg-white">
        <!-- Contenido del segundo div -->


                <h2 class="text-1xl font-semibold text-center mb-4">Actualizar Datos del Usuario</h2>
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <div class="">
                            <div class="mb-4">
                                <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Usuario</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                    class="border rounded-lg py-2 px-2 w-2/3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div class="mb-4">
                                <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                                <input type="password" name="password" id="password" value="{{ $user->password }}"
                                    class="border rounded-lg py-2 px-2 w-2/3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            </div>
                            <div class="flex justify-center mt-4">
                                <button type="submit" name="update_button" value="update"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded sm:w-auto">Guardar
                                    Cambios</button>
                            </div>
                        </div>

                    </div>

                </form>


    </div>
</div>

@endsection
{{-- @stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}
