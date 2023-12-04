<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\cliente;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compra = Compra::get();
        $provedor = Provedor::all();
        return view('VistaCompra.index', compact('compra', 'provedor'));
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
        $compra->provedor_id = $r->input('ci');
       // dd($compra);
        $compra->formapago = $r->input('formapago');
        // dd($venta->cliente_id);
        // Obtener el ID del usuario autenticado y asignarlo al campo usuario_id de la venta
     //   dd($compra->proveedor_id);
        $usuario_id = Auth::id();
        $compra->usuario_id = $usuario_id;
        $compra->save();
        // Obtener el ID de la venta recién creada
        $compra_id = $compra->id;

        return redirect()->route('detallecompra.index', ['compra_id' => $compra_id])->with('success', 'Nota de Compra Registrada correctamente');
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
