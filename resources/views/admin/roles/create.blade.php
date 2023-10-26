@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto my-5 p-6"
        style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); font-family: 'Verdana', sans-serif; margin-bottom: 1px;">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store'])!!}
                <div class="form-group">
                    {!! Form::label('name','nombre')!!}
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'ingrese el nombre del rol'])!!}
                    @error('name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>
                <h2 class="h3">Lista de Permisos</h2>
                @foreach ($permissions as $permission)
                    <div>
                        {!! Form::checkbox('permissions[]', $permission->id,null, ['class'=>'mr-1']) !!}
                        {{$permission->description}}
                    </div>
                @endforeach
                {!! Form::submit('Crear Rol',['class'=>'btn btn-primary'])!!}
            {!! Form::close()!!}
        </div>
    </div>
</div>
@endsection
