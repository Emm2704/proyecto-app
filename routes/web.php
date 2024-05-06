<?php

use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProyectoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('/proyectos', [ProyectoController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('proyectos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

// Porjectos routes

Route::resource('proyectos', ProyectoController::class)->parameters([
    'proyectos' => 'proyecto',
]) ->middleware(['auth', 'verified']);

// tareas routes

Route::resource('tareas', TareaController::class)->parameters([
    'tareas' => 'tarea',
]) ->middleware(['auth', 'verified']);

Route::get('/files', [TareaController::class, 'loadView'])->name('proyectos.files.index');
Route::post('/files', [TareaController::class, 'storeFile'])->name('proyectos.files.store');
Route::get('/files/{name}', [TareaController::class, 'downloadFile'])->name('proyectos.files.download');


// grupos routes
Route::resource('grupos', GrupoController::class)->parameters([
    'grupos' => 'grupo',
]) ->middleware(['auth', 'verified']);

// user Routes

Route::resource('usuarios', UserController::class)->middleware(['auth', 'verified']);

Route::put('/usuarios{usuario}', [UserController::class, 'inactivar']) -> name('usuarios.inactivar');
Route::put('/usuarios/{usuario}/activar', [UserController::class, 'activar'])->name('usuarios.activar');


