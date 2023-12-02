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
        $provedor = Provedor::get();
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
         // Validar que el CI sea único antes de almacenar el cliente
         $existingProv = Provedor::where('ci', $r->ci)->first();


         if ($existingProv) {
             // El CI ya existe en la base de datos, podrías manejar esta situación aquí
             // Puedes devolver un mensaje de error o redirigir a donde desees
             return redirect()->route('compra.index')->with('success', 'Ci del Proveedor ya existe')->withInput();
         }
             // dd($r);
             $provedor = new Provedor();
             $provedor->ci = $r->input('ci');
             $provedor->nombre = $r->input('nombre');
             $provedor->celular = $r->input('celular');
             $provedor->direccion = $r->input('direccion');
             $provedor->save();

             activity()
                 ->causedBy(auth()->user())
                 ->log('Registro el cliente exitosamente: ' . $provedor->nombre);


         return redirect()->route('compra.index')->with('success', 'Proveedor registrado Correctamente')->withInput();
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
        activity()
            ->causedBy(auth()->user())
            ->log('Modifico datos del proveedor: '.$provedor->nombre);

        return redirect()->route('provedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provedor $provedor)
    {
        activity()
            ->causedBy(auth()->user())
            ->log('Elimino al proveedor: '.$provedor->nombre);

          // Encuentra el producto por su ID y elimínalo
          $provedor->delete();

          // Redirige de vuelta a la lista de productos con un mensaje de éxito
          return redirect()->route('provedor.index');
    }
}
