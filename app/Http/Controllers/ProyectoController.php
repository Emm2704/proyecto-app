<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Protocol;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $proyectos = DB::table('projects')
       ->join('users', 'projects.lider_id', '=', 'users.id')
       ->select('projects.*', 'users.name as nombre_user')
       ->get();

       return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        return view('proyectos.new', ['users' => $users]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto -> nombre = $request->nombre;
        $proyecto -> lider_id = $request->lider_id;
        $proyecto -> presupuesto = $request -> presupuesto;
        $proyecto -> presupuesto_usado = $request -> presupuesto_usado; // default 0
        $proyecto -> estado = $request->estado; //default en progreso
        $proyecto -> porcentaje_avance = $request->porcentaje_avance; // default 0
        $proyecto -> presupuesto = $request -> presupuesto;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_final = $request->fecha_final;
        $proyecto->save();

        $proyectos = DB::table('projects')
       ->join('users', 'projects.lider_id', '=', 'users.id')
       ->select('projects.*', 'users.name as nombre_user')
       ->get();

       return view('proyectos.index', ['proyectos' => $proyectos]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyecto = Proyecto::find($id);

        $users = DB::table('users')
        ->orderBy('name')
        ->get();

        return view ('proyectos.edit', ['proyecto' => $proyecto, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);

        $proyecto -> nombre = $request->nombre;
        $proyecto -> lider_id = $request->lider_id;
        $proyecto -> presupuesto = $request -> presupuesto;
        $proyecto -> presupuesto_usado = $request -> presupuesto_usado; // default 0
        $proyecto -> estado = $request->estado; //default en progreso
        $proyecto -> porcentaje_avance = $request->porcentaje_avance; // default 0
        $proyecto -> presupuesto = $request -> presupuesto;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_final = $request->fecha_final;
        $proyecto->save();

        $proyectos = DB::table('projects')
       ->join('users', 'projects.lider_id', '=', 'users.id')
       ->select('projects.*', 'users.name as nombre_user')
       ->get();

       return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();

        $proyectos = DB::table('projects')
       ->join('users', 'projects.lider_id', '=', 'users.id')
       ->select('projects.*', 'users.name as nombre_user')
       ->get();

       return view('proyectos.index', ['proyectos' => $proyectos]);
    }
}
