@extends('layouts.app')

@section('content')
    <h2>Nueva Tarea</h2>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de entrega:</label>
            <input type="date" name="fecha_entrega" class="form-control" value="{{ old('fecha_entrega') }}">
            @error('fecha_entrega') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Guardar</button>
    </form>
@endsection
