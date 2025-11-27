<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('alumnos.index') }}">Sistema de Alumnos</a>
            <div>
                <a href="{{ route('alumnos.index') }}" class="btn btn-outline-light btn-sm">Inicio</a>
                <a href="{{ route('alumnos.create') }}" class="btn btn-outline-light btn-sm">Nuevo Alumno</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('partials.flash')
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
