<?php

namespace App\Http\Controllers;

use App\Models\pago;
use App\Models\Venta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\cliente;



class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $formapagoSeleccionado = $request->input('formapago');


        if ($formapagoSeleccionado) {

            $ventas = Venta::where('formapago', $formapagoSeleccionado)->get();
        } else {

            $ventas = Venta::all();
        }

        return view('Vistapago.index', compact('ventas', 'formapagoSeleccionado'));
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
    public function store(Request $r)
    {
        $venta = new Venta();

        $venta->formapago = $r->input('formapago');
        // dd($venta->cliente_id);
        // Obtener el ID del usuario autenticado y asignarlo al campo usuario_id de la venta

        // Obtener el ID de la venta recién creada
        $venta_id = $venta->id;




    // Redirigir a la ruta 'detalleventa.index' con el ID de la venta como parámetro
    return redirect()->route('pago.index', ['venta_id' => $venta_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pago $pago)
    {
        //
    }
}
