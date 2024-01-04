<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materia = materia::get();
        return view('VistaMateria.index', compact('materia'));
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
    public function store(Request $r)
    {
        $materia = new materia();
        $materia->nombre = $r->nombre;
        $materia->descripcion = $r->descripcion;
        $materia->save();
        return redirect()->route('materia.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $materia = Materia::find($id);

        $materia->delete();
        return redirect()->route('materia.index');
    }
}
