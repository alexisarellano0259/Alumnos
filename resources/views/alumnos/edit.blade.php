@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Alumno</h2>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Necesario para que Laravel entienda que es una actualización -->

        <div class="mb-3">
            <label for="codigo" class="form-label">Código:</label>
            <input type="text" name="codigo" class="form-control" value="{{ $alumno->codigo }}" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $alumno->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo:</label>
            <input type="email" name="correo" class="form-control" value="{{ $alumno->correo }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $alumno->fecha_nacimiento }}" required>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select name="sexo" class="form-select" required>
                <option value="Masculino" {{ $alumno->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $alumno->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="carrera" class="form-label">Carrera:</label>
            <input type="text" name="carrera" class="form-control" value="{{ $alumno->carrera }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
