<?php

namespace App\Http\Controllers;

use App\Models\DocenteMateria;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Http\Request;

class DocenteMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentemateria=docentemateria::get();
        $materia=materia::get();
        $docente=docente::get();
        return view('VistaDocenteMateria.index',compact('docentemateria','docente','materia'));
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
        $docentemateria = new docentemateria();

        $docentemateria->docente_id= $r->docente_id;
       // dd($docentemateria);
        $docentemateria->materia_id= $r->materia_id;
        $docentemateria->save();
        return redirect()->route('docentemateria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocenteMateria $docenteMateria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocenteMateria $docenteMateria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocenteMateria $docenteMateria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $docentemateria = DocenteMateria::find($id);
        $docentemateria->delete();
        return redirect()->route('docentemateria.index');
    }
}
