@extends('layouts.app')

@section('content')
    <h1>Lista de Alumnos</h1>

    <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Agregar Alumno</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->codigo }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->correo }}</td>
                    <td>{{ $alumno->carrera }}</td>
                    <td>
                        <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este alumno?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
