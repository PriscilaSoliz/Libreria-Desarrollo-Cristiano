@extends('adminlte::page')
@section('content')
     @livewire('admin.users-index')
     @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
{{-- @stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}



