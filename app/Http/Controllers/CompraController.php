<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compra = Compra::get();
        return view('VistaCompra.index', compact('compra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $compra = Compra::all();
        return view('VistaCompra.Create', compact('compra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {

        $compra = new Compra();
            $compra->formapago = $r->formapago;
            $compra->fecha = $r->fecha;
            $compra->hora = $r->hora;
            $compra->total = $r->total;
            $compra->proveedor_id = $r->proveedor_id;
        $compra->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
