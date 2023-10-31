<?php

namespace App\Http\Controllers;
use App\Models\provedor;
use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $buscar = $request->input('buscar');

         $producto = Producto::orderByRaw("nombre LIKE '$buscar%' DESC, ubicacion LIKE '$buscar%' DESC , codigo LIKE '$buscar%' DESC,editorial LIKE '$buscar%' DESC, version LIKE '$buscar%' DESc , autor LIKE '$buscar%' DESC")
             ->get();

         return view('VistaProducto.index', compact('producto', 'buscar'));
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< Updated upstream
        $provedor = provedor::all(); // Obtén todos los proveedores de la base de datos
        return view('VistaProducto.create', compact('provedor'));
        // return view('VistaProducto.create');
=======
        return view('VistaProducto.Create');
>>>>>>> Stashed changes
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // dd($r);
        $producto = new producto();
        $producto->codigo = $r->codigo;
        $producto->nombre = $r->nombre;
        $producto->autor = $r->autor;
        $producto->version = $r->version;
        $producto->editorial = $r->editorial;
        $producto->precio = $r->precio;
        $producto->cantidad = $r->cantidad;
        $producto->ubicacion = $r->ubicacion;
        $producto->proveedor_id = $r->proveedor_id;
        $producto->save();
        return redirect()->route('producto.index');

    }




    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //  return view('vista_eliminar', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        return view('VistaProducto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, producto $producto)
    {
        // Validación de los datos del formulario (puedes usar la función `validate`)
        $producto->codigo = $r->input('codigo');
        $producto->nombre = $r->input('nombre');
        $producto->precio = $r->input('precio');
        $producto->cantidad = $r->input('cantidad');
        $producto->autor = $r->input('autor');
        $producto->version = $r->input('version');
        $producto->editorial = $r->input('editorial');
        $producto->ubicacion = $r->input('ubicacion');
        // Actualiza otros campos según sea necesario

        $producto->save();

        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        // Encuentra el producto por su ID y elimínalo
        $producto->delete();

        // Redirige de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente');
    }
}
