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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
