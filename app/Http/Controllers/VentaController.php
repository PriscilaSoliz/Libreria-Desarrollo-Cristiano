<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        $venta = Venta::get();
        $cliente=cliente::all();
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
        $venta->formapago = $r->input('formapago');
        $venta->cliente_id = $r->input('ci');
        // Obtener el ID del usuario autenticado y asignarlo al campo usuario_id de la venta
        $usuario_id = Auth::id();
        $venta->usuario_id = $usuario_id;
        $venta->save();
        // Obtener el ID de la venta recién creada
        $venta_id = $venta->id;

        // activity()
        //     ->causedBy(auth()->user())
        //     ->log('Realizo venta al cliente: ' . $venta->cliente_id->nombre);
        // session()->flash('success', 'La Venta se ha realizado exitosamente');

    // Redirigir a la ruta 'detalleventa.index' con el ID de la venta como parámetro
    return redirect()->route('detalleventa.index', ['venta_id' => $venta_id]);
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
