<?php

namespace App\Http\Controllers;

use App\Models\productodetalle;
use Illuminate\Http\Request;

class ProductodetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('VistaProductoDetalle.index');
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
    public function show(productodetalle $productodetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productodetalle $productodetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productodetalle $productodetalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productodetalle $productodetalle)
    {
        //
    }
}
