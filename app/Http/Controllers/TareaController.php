<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $proyecto_id = $request->input('proyecto_id');
    
    $tareas = DB::table('tasks')
        ->join('users', 'tasks.id_encargado', '=', 'users.id')
        ->join('projects', 'tasks.id_proyecto', '=', 'projects.id')
        ->where('tasks.id_proyecto', '=', $proyecto_id)
        ->select('tasks.*', 'users.name as nombre_user', 'projects.nombre as nombre_proyecto')
        ->get();

    return view('tareas.index', ['tareas' => $tareas]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        $proyectos = DB::table('projects')
        ->orderBy('nombre')
        ->get();

        return view('tareas.new', ['users' => $users, 'proyectos' => $proyectos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación y almacenamiento de otros campos de la tarea

        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->id_encargado = $request->lider_id;
        $tarea->id_proyecto = $request->id_proyecto;
        $tarea->descripcion = $request->descripcion;
        $tarea->estado = $request->estado;
        $tarea->tipo = $request->tipo;
        $tarea->save();

        // Obtener las tareas del proyecto y devolver al índice de tareas
        $tareas = DB::table('tasks')
            ->join('users', 'tasks.id_encargado', '=', 'users.id')
            ->join('projects', 'tasks.id_proyecto', '=', 'projects.id')
            ->where('tasks.id_proyecto', '=', $request->id_proyecto)
            ->select('tasks.*', 'users.name as nombre_user', 'projects.nombre as nombre_proyecto')
            ->get();

        return view('tareas.index', ['tareas' => $tareas]);
    }


    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
