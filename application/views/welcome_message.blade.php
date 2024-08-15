@extends('layouts.base')
@section('css')
@endsection
@section('titulo', 'Roles')
@section('contenido')
    <h2>Bienvenido a CodeIgniter con Blade</h2>
    <p>Esta es una vista hija que hereda de la vista principal.</p>
    @can('crear_usuarios')
        <p>El usuario tiene permiso para editar publicaciones.</p>
    @else
        <p>El usuario NO tiene permiso para editar publicaciones.</p>
    @endcan
@endsection
@section('js')
@endsection