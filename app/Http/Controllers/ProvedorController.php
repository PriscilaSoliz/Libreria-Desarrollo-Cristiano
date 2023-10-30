<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use Illuminate\Http\Request;

class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provedor = provedor::get();
        return view('VistaProvedor.index', compact('provedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('VistaProvedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
         // dd($r);
         $provedor= new provedor();
         $provedor->ci = $r->ci;
         $provedor->nombre = $r->nombre;
         $provedor->celular = $r->celular;
         $provedor->direccion = $r->direccion;
         $provedor->save();
         return redirect()->route('provedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provedor $provedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provedor $provedor)
    {
        return view('VistaProvedor.edit', compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Provedor $provedor)
    {
        // Validación de los datos del formulario (puedes usar la función `validate`)
        $provedor->ci = $r->input('ci'); // Campo 'ci'
        $provedor->nombre = $r->input('nombre'); // Campo 'nombre'
        $provedor->celular = $r->input('celular'); // Campo 'celular'
        $provedor->direccion = $r->input('direccion'); // Campo 'direccion'
        // Actualiza otros campos según sea necesario

        $provedor->save();

        return redirect()->route('provedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provedor $provedor)
    {
          // Encuentra el producto por su ID y elimínalo
          $provedor->delete();

          // Redirige de vuelta a la lista de productos con un mensaje de éxito
          return redirect()->route('provedor.index');
    }
}
