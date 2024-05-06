<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', ['grupos' => $grupos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupos.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nombre = $request->nombre;
        $grupo->save();

        $grupos = Grupo::all();
        return view('grupos.index', ['grupos' => $grupos]);

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
        $grupo = Grupo::find($id);
        return view('grupos.edit', ['grupo' => $grupo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $grupo = Grupo::find($id);

        $grupo->nombre = $request->nombre;
        $grupo->save();

        $grupos = Grupo::all();
        return view('grupos.index', ['grupos' => $grupos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();

        $grupos = Grupo::all();
        return view('grupos.index', ['grupos' => $grupos]);
    }
}
