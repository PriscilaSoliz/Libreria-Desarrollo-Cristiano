<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $cliente=cliente::all();
        $venta = Venta::get();
        return view('VistaVenta.index', compact('venta','cliente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $venta = Venta::all();
        return view('VistaVenta.Create', compact('venta'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $venta = new Venta();
        $venta ->formapago = $r->formapago;
        $venta ->total = $r->total;
        $venta ->cliente_id = $r->cliente_id;
    $venta ->save();
    return redirect()->route('detalleventa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
