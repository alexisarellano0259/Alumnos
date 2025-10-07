@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Alumno</h2>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Código:</strong> {{ $alumno->codigo }}</p>
            <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
            <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
            <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
            <p><strong>Carrera:</strong> {{ $alumno->carrera }}</p>
        </div>
    </div>

    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-primary mt-3">Editar alumno</a>
</div>
@endsection
