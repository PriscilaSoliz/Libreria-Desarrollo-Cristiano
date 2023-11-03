<?php

namespace App\Http\Controllers;

use App\Models\detallecategoria;
use Illuminate\Http\Request;

class DetallecategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallecategoria = detallecategoria::get();
        return view('VistaDetalleCategoria.index', compact('detallecategoria'));
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
        $detallecategoria = new detallecategoria();
        $detallecategoria->descripcion = $r->descripcion;
        $detallecategoria->save();

        activity()
             ->causedBy(auth()->user())
            ->log('Registro una nuevo Detalle categoria: '.$detallecategoria->descripcion);
        return redirect()->route('detallecategoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(detallecategoria $detallecategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detallecategoria $detallecategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detallecategoria $detallecategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detallecategoria $detallecategoria)
    {
        //
    }
}
