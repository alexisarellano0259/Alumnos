@extends('layouts.app')

@section('content')
<h1>Editar Alumno</h1>

<form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" value="{{ old('codigo', $alumno->codigo) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" value="{{ old('correo', $alumno->correo) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Sexo</label>
        <select name="sexo" class="form-select">
            <option value="M" {{ old('sexo', $alumno->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo', $alumno->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Carrera</label>
        <input type="text" name="carrera" value="{{ old('carrera', $alumno->carrera) }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection
