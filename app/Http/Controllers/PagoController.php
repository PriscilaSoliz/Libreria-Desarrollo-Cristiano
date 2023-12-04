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
        //
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
