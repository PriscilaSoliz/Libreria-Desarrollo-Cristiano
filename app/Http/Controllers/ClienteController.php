<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\cliente;
use App\Models\Venta;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cliente = cliente::get();
        $venta= venta::get();
        return view('VistaCliente.index', compact('cliente','venta'));
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

        // Validar que el CI sea único antes de almacenar el cliente
        $existingClient = Cliente::where('ci', $r->ci)->first();


        if ($existingClient) {
            // El CI ya existe en la base de datos, podrías manejar esta situación aquí
            // Puedes devolver un mensaje de error o redirigir a donde desees
            return redirect()->route('venta.index')->withInput();
        }
            // dd($r);
            $cliente = new cliente();
            $cliente->ci = $r->input('ci');
            $cliente->nombre = $r->input('nombre');
            $cliente->celular = $r->input('celular');
            $cliente->direccion = $r->input('direccion');
            $cliente->save();
            
            activity()
             ->causedBy(auth()->user())
            ->log('Se registro el cliente exitosamente: ' . $cliente->nombre);


            return redirect()->route('venta.index')->withInput();

         
    }


    /**
     * Display the specified resource.
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
