@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Listado de Tareas</h2>
        <a href="{{ route('tareas.create') }}" class="btn btn-primary">Nueva Tarea</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha entrega</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->nombre }}</td>
                    <td>{{ $t->fecha_entrega }}</td>
                    <td>{{ $t->user->name }}</td>
                    <td>
                        <a href="{{ route('tareas.show', $t) }}" class="btn btn-info btn-sm">Ver</a>

                        @can('update', $t)
                            <a href="{{ route('tareas.edit', $t) }}" class="btn btn-warning btn-sm">Editar</a>
                        @endcan

                        @can('delete', $t)
                            <form action="{{ route('tareas.destroy', $t) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
