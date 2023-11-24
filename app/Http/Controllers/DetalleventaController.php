<?php

namespace App\Http\Controllers;

use App\Models\detalleventa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Venta;
use App\Models\cliente;

class DetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $producto = producto::all();
        $venta = Venta::all();
        $cliente = cliente::all();
        $detalleventa = detalleventa::get();

        $venta_id = $request->input('venta_id');
        $venta = Venta::find($venta_id);

        // Luego, pasas los detalles de la venta a la vista
        return view('VistaDetalleventa.index', ['venta' => $venta], compact('detalleventa', 'producto', 'venta', 'cliente'));
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


        $venta_id = $r->input('venta_id');
        // dd($venta_id); // Verifica si $venta_id tiene el valor esperado

        // $venta = Venta::find($venta_id);
        // dd($venta);

        $detalleVenta = new detalleventa();
        $detalleVenta->venta_id = $r->venta_id; // Ajusta esto según tu lógica
        $detalleVenta->precio = $r->precio;
        $detalleVenta->cantidad = $r->cantidad;
        $detalleVenta->subtotal = $r->subtotal; // Ajusta esto según tu lógica
        $detalleVenta->total += $r->subtotal;

        // Se asume que 'producto_id' se obtiene del campo 'producto_id' del formulario
        $detalleVenta->producto_id = $r->producto_id;

        $detalleVenta->save();

        $producto = producto::all();
        $venta = Venta::all();
        $cliente = cliente::all();
        $detalleventa = detalleventa::get();



        activity()
            ->causedBy(auth()->user())
            ->log('Registro venta con id: '.$detalleVenta->venta_id);

     return redirect()->route('detalleventa.index');
        $venta_id = $r->input('venta_id');
        $venta = Venta::find($venta_id);
        return view('VistaDetalleventa.index', ['venta' => $venta], compact('detalleventa', 'producto', 'venta', 'cliente'));
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
