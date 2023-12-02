<?php

namespace App\Http\Controllers;

use App\Models\detallecompra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\DetalleCompraCreated;
use App\Models\producto;
use App\Models\Compra;
use App\Models\Provedor;

class DetallecompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $producto = producto::all();
        $compra= Compra::all();
        $provedor = Provedor::all();
        $detallecompra = detallecompra::get();

        $compra_id = $request->input('compra_id');
        $compra = compra::find($compra_id);

        // Luego, pasas los detalles de la venta a la vista
        return view('VistaDetallecompra.index', ['compra' => $compra], compact('detallecompra', 'producto', 'compra', 'provedor'));
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
        $compra_id = $r->input('compra_id');
        $detallecompra = new detallecompra();
     dd($compra_id); // Verifica si $venta_id tiene el valor esperado

        // $venta = Venta::find($venta_id);
        // dd($venta);
        $detallecompra->precio = $r->precio;
        $detallecompra->cantidad = $r->cantidad;
        $detallecompra->subtotal = $r->subtotal; // Ajusta esto según tu lógica
        // Se asume que 'producto_id' se obtiene del campo 'producto_id' del formulario
        $detallecompra->compra_id = $r->compra_id; // Ajusta esto según tu lógica
        $detallecompra->producto_id = $r->producto_id;
        $detallecompra->save();

        $producto = producto::all();
        $compra_id = Compra::all();
        $provedor = Provedor::all();
        $detallecompra =detallecompra::get();

        // activity()
        //     ->causedBy(auth()->user())
        //     ->log('Registro venta con id: '.$detallecompra->compra_id);

   //  return redirect()->route('detalleventa.index');
        $compra_id = $r->input('compra_id');
        $compra = Compra::find($compra_id);
        return view('VistaDetallecompra.index', ['compra' => $compra], compact('detallecompra', 'producto', 'compra', 'provedor'));
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
