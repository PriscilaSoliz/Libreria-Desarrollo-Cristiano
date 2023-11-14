<?php

namespace App\Http\Controllers;

use App\Models\detalleventa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Venta;

class DetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto=producto::all();
        $venta=Venta::all();
        $detalleventa = detalleventa::get();
        return view('VistaDetalleventa.index', compact('detalleventa','producto','venta'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detalleventa = detalleventa::all();
        return view('VistaDetalleventa.Create', compact('detalleventa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $detalleVenta = new detalleventa();
        $detalleVenta->venta_id = $r->venta_id; // Ajusta esto según tu lógica
        $detalleVenta->precio = $r->precio;
        $detalleVenta->cantidad = $r->cantidad;
        $detalleVenta->descuento = $r->descuento;
        $detalleVenta->subtotal = $r->subtotal; // Ajusta esto según tu lógica

        $detalleVenta->producto_id = $r->producto_id; // Asociamos el producto recién creado
        $detalleVenta->save();

        // Disparar el evento para activar el observador
   


    //     activity()
    //     ->causedBy(auth()->user())
    //     ->log('Registro un proveedor: '.$detalleCompra->nombre);
     return redirect()->route('detalleventa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(detalleventa $detalleventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalleventa $detalleventa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalleventa $detalleventa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detalleventa $detalleventa)
    {
        //
    }
}