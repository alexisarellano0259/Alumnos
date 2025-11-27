<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function __construct()
    {
        // Solo permitimos crear/editar/borrar a usuarios autenticados.
        // index/show (no requieren autenticación).
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        // Mostramos todas las tareas (cualquiera puede ver)
        $tareas = Tarea::with('user')->orderBy('fecha_entrega')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_entrega' => 'required|date',
        ]);

        Tarea::create([
            'user_id' => auth()->id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha_entrega' => $request->fecha_entrega,
        ]);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea)
    {
        $this->authorize('update', $tarea);
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $this->authorize('update', $tarea);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_entrega' => 'required|date',
        ]);

        $tarea->update($request->only(['nombre','descripcion','fecha_entrega']));

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada.');
    }

    public function destroy(Tarea $tarea)
    {
        $this->authorize('delete', $tarea);
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada.');
    }
}
