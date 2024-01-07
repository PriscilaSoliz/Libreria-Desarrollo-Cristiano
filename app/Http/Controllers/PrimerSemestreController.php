<?php

namespace App\Http\Controllers;

use App\Models\PrimerSemestre;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Semestre;
use App\Models\Docente;
use App\Models\DocenteMateria;

class PrimerSemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materia = materia::get();
        $semestre = semestre::get();
        return view('VistaPrimerSemestre.index', compact('materia', 'semestre'));
    }

    public function materia(Request $request, $id)
    {
        if ($id == 1) {
            $materia = Materia::find($id);
            $docente = Docente::get();
            $docentemateria = DocenteMateria::get();
            return view('VistaPrimerSemestre.materia1',compact('materia','docente','docentemateria'));
        }
        if ($id == 2) {
            $materia = Materia::find($id);
            $docente = Docente::get();
            $docentemateria = DocenteMateria::get();
            return view('VistaPrimerSemestre.materia2',compact('materia','docente','docentemateria'));
        }
    }

    public function materiaedit(Request $request, $id)
    {
        if ($id == 1) {
            $materia = Materia::find($id);
            $docente = Docente::get();
            $docentemateria = DocenteMateria::get();
            return view('VistaPrimerSemestre.materiaedit1',compact('materia','docente','docentemateria'));
        }
        if ($id == 2) {
            $materia = Materia::find($id);
            $docente = Docente::get();
            $docentemateria = DocenteMateria::get();
            return view('VistaPrimerSemestre.materiaedit2',compact('materia','docente','docentemateria'));
        }
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
    public function show(PrimerSemestre $primerSemestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrimerSemestre $primerSemestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrimerSemestre $primerSemestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrimerSemestre $primerSemestre)
    {
        //
    }
}
