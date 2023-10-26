@extends('layouts.app')


@section('content')
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto my-5 p-6"
            style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); font-family: 'Verdana', sans-serif; margin-bottom: 1px;">
            <h2 class="text-2xl font-semibold text-center mb-4">Asignar Rol</h2>
            @if (session('info'))
                <div class="alert alert-success">
                    <strong>{{ session('info') }}</strong>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
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
            </div>
        </div>
    </div>


    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto my-5 p-6"
            style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); font-family: 'Verdana', sans-serif; margin-bottom: 1px;">
            <h2 class="text-2xl font-semibold text-center mb-4">Actualizar Datos del Usuario</h2>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
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
                        {{-- <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div> --}}
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" name="update_button" value="update"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded sm:w-auto">Guardar
                        Cambios</button>

                </div>
            </form>
        </div>
    </div>
    {{-- <div class="py-2">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto my-20 p-6"
                style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); font-family: 'Verdana', sans-serif;">
                <h2 class="text-2xl font-semibold text-center mb-4">Actualizar Usuario</h2>
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Usuario</label>
                            <input type="email" name="correo" id="correo" value="#"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div class="mb-4">
                            <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                            <input type="password" name="direccion" id="direccion" value="#"
                                class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">Guardar
                            Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
{{-- @stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}
