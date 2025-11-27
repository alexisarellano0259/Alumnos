@extends('layouts.app')

@section('content')
    <h2>Editar Tarea</h2>

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $tarea->nombre) }}">
            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $tarea->descripcion) }}</textarea>
            @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha entrega:</label>
            <input type="date" name="fecha_entrega" class="form-control" 
                   value="{{ old('fecha_entrega', $tarea->fecha_entrega) }}">
            @error('fecha_entrega') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Actualizar</button>
    </form>
@endsection
