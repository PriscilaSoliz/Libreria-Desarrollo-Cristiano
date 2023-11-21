<?php

namespace App\Http\Controllers;

use App\Models\detallecompra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\DetalleCompraCreated;
use App\Models\producto;
use App\Models\Compra;



class DetallecompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto=producto::all();
        $compra=Compra::all();
        $detallecompra = detallecompra::get();
        return view('VistaDetallecompra.index', compact('detallecompra','producto','compra'));
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
        $detalleCompra->compra_id = $r->compra_id; // Ajusta esto según tu lógica
        $detalleCompra->precio = $r->precio;
        $detalleCompra->cantidad = $r->cantidad;
        $detalleCompra->subtotal = $r->subtotal; // Ajusta esto según tu lógica

        $detalleCompra->producto_id = $r->producto_id; // Asociamos el producto recién creado
        $detalleCompra->save();

        // Disparar el evento para activar el observador
        activity()
            ->causedBy(auth()->user())
            ->log('Se registro un detalle compra con id: '.$detalleCompra->compra_id);

         return redirect()->route('detallecompra.index');
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
