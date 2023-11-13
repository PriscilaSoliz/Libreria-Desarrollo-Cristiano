<?php

namespace App\Http\Controllers;

use App\Models\detallecompra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\DetalleCompraCreated;



class DetallecompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detallecompra = detallecompra::get();
        return view('VistaDetallecompra.index', compact('detallecompra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detallecompra = detallecompra::all();
        return view('VistaDetallecompra.Create', compact('detallecompra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $detalleCompra = new detallecompra();
        $detalleCompra->precio = $r->precio;
        $detalleCompra->cantidad = $r->cantidad;
        $detalleCompra->subtotal = $r->subtotal; // Ajusta esto según tu lógica
        $detalleCompra->compra_id = $r->compra_id; // Ajusta esto según tu lógica
        $detalleCompra->producto_id = $r->producto_id; // Asociamos el producto recién creado
        $detalleCompra->save();

        // Disparar el evento para activar el observador
        event(new DetalleCompraCreated($detalleCompra));

    //     activity()
    //     ->causedBy(auth()->user())
    //     ->log('Registro un proveedor: '.$detalleCompra->nombre);
    //  return redirect()->route('compra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(detallecompra $r)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detallecompra $detallecompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detallecompra $detallecompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detallecompra $detallecompra)
    {
        //
    }
}
