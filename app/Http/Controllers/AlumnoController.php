<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = \App\Models\Alumno::all(); // Trae todos los alumnos
    return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los campos
         $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email|unique:alumnos,correo',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'carrera' => 'required',
       ]);

    // Guardar alumno
         Alumno::create($request->all());

    // Redirigir al listado con mensaje
    return redirect()->route('alumnos.index')->with('success', 'Alumno agregado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //$alumno = Alumno::findOrFail($id);
    return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
         $request->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'correo' => 'required|email|unique:alumnos,correo,' . $id,
        'fecha_nacimiento' => 'required|date',
        'sexo' => 'required',
        'carrera' => 'required',
    ]);

    $alumno = Alumno::findOrFail($id);
    $alumno->update($request->all());

    return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
