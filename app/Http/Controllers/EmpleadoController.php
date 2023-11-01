<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $empleado = empleado::get();
        return view('VistaEmpleado.index', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('VistaEmpleado.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $empleado = new empleado();
        $empleado->ci = $r->ci;
        $empleado->nombre = $r->nombre;
        $empleado->celular = $r->celular;
        $empleado->correo = $r->correo;
        $empleado->direccion = $r->direccion;
        $empleado->cargo = $r->cargo;
        $empleado->save();

        activity()
            ->causedBy(auth()->user())
            ->log('Registro un nuevo empleado: '.$empleado->nombre);
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(empleado $empleado)
    {

        return view('VistaEmpleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, empleado $empleado)
    {
        // Validación de los datos del formulario (puedes usar la función `validate`)
        $empleado->ci = $r->input('ci'); // Campo 'ci'
        $empleado->nombre = $r->input('nombre'); // Campo 'nombre'
        $empleado->celular = $r->input('celular'); // Campo 'celular'
        $empleado->correo = $r->input('correo'); // Campo 'correo'
        $empleado->direccion = $r->input('direccion'); // Campo 'direccion'
        $empleado->cargo = $r->input('cargo'); // Campo 'cargo'
        // Actualiza otros campos según sea necesario

        $empleado->save();
        activity()
            ->causedBy(auth()->user())
            ->log('Modifico los datos del empleado: '.$empleado->nombre);

        return redirect()->route('empleado.index')->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $empleado)
    {
        activity()
            ->causedBy(auth()->user())
            ->log('Elimino al empleado: '.$empleado->nombre);
        // Encuentra el producto por su ID y elimínalo
        $empleado->delete();

        // Redirige de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('empleado.index')->with('success', 'empleado eliminado correctamente');
    }
}
