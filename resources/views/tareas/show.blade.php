@extends('layouts.app')

@section('content')
    <h2>Detalles de la Tarea</h2>

    <div class="card">
        <div class="card-body">
            <h3>{{ $tarea->nombre }}</h3>
            <p><strong>Descripción:</strong> {{ $tarea->descripcion }}</p>
            <p><strong>Fecha de entrega:</strong> {{ $tarea->fecha_entrega }}</p>
            <p><strong>Usuario:</strong> {{ $tarea->user->name }}</p>
        </div>
    </div>

    <a href="{{ route('tareas.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
