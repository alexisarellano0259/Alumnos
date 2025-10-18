@extends('layouts.app')

@section('content')
<h1>Agregar Alumno</h1>

<form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" value="{{ old('codigo') }}" class="form-control">
        @error('codigo') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
        @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" value="{{ old('correo') }}" class="form-control">
        @error('correo') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control">
        @error('fecha_nacimiento') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Sexo</label>
        <select name="sexo" class="form-select">
            <option value="">Seleccione...</option>
            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>
        @error('sexo') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Carrera</label>
        <input type="text" name="carrera" value="{{ old('carrera') }}" class="form-control">
        @error('carrera') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
