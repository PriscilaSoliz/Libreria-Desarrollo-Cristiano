<?php

namespace App\Http\Controllers;

use App\Models\PrimerSemestre;
use Illuminate\Http\Request;

class PrimerSemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('VistaPrimerSemestre.index');
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
