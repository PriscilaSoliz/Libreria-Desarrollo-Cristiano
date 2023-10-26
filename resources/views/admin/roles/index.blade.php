@extends('layouts.app')
@section('content')
@if (session('info'))
        <div class="alert alert-seccess">
            {{ session('info') }}
        </div>
@endif
<div class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto my-5 p-6"
        style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); font-family: 'Verdana', sans-serif; margin-bottom: 1px;">
        <a href="{{route('admin.roles.create')}}">Nuevo Rol</a>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th Colspan>"2"</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btm-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
