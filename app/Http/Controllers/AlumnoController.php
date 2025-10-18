<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email|unique:alumnos',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'carrera' => 'required',
        ]);

        Alumno::create($validated);
        return redirect()->route('alumnos.index')->with('success', 'Alumno agregado correctamente.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validated = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email|unique:alumnos,correo,' . $alumno->id,
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            'carrera' => 'required',
        ]);

        $alumno->update($validated);
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}
