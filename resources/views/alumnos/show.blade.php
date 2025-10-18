@extends('layouts.app')

@section('content')
<h1>Detalle del Alumno</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $alumno->id }}</li>
    <li class="list-group-item"><strong>Código:</strong> {{ $alumno->codigo }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $alumno->nombre }}</li>
    <li class="list-group-item"><strong>Correo:</strong> {{ $alumno->correo }}</li>
    <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</li>
    <li class="list-group-item"><strong>Sexo:</strong> {{ $alumno->sexo }}</li>
    <li class="list-group-item"><strong>Carrera:</strong> {{ $alumno->carrera }}</li>
</ul>

<a href="{{ route('alumnos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection

