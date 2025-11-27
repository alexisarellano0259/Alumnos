<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return redirect()->route('alumnos.index');
});

Route::resource('alumnos', AlumnoController::class);

Route::resource('tareas', TareaController::class);