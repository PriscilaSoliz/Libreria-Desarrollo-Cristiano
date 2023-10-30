<?php

namespace App\Http\Controllers;
use App\Models\producto;
use App\Models\Provedor;
use App\Models\detalle_producto;
use Illuminate\Http\Request;

class DetalleProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('VistaDetalle.index');
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
    public function show(detalle_producto $detalle_producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalle_producto $detalle_producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalle_producto $detalle_producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detalle_producto $detalle_producto)
    {
        //
    }
}
