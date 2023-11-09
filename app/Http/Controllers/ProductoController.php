<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use App\Models\Categoria;
use App\Models\user;
use App\Models\producto;
use App\Models\notadeentrada;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $producto = producto::orderByRaw("nombre LIKE '$buscar%' DESC, ubicacion LIKE '$buscar%' DESC , codigo LIKE '$buscar%' DESC,editorial LIKE '$buscar%' DESC, version LIKE '$buscar%' DESc , autor LIKE '$buscar%' DESC")
            ->get();

        return view('VistaProducto.index', compact('producto', 'buscar'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provedor = Provedor::all(); // Obtén todos los proveedores de la base de datos
        $categoria = Categoria::all();
        return view('VistaProducto.Create', compact('provedor', 'categoria'));
        // return view('VistaProducto.create');
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
        $producto->categoria_id = $r->categoria_id;
        $producto->save();

        activity()
            ->causedBy(auth()->user()) //Usuario responsable
            ->log('Registro el producto: ' . $producto->nombre);

        return redirect()->route('producto.index');
    }




    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto, Request $request)
    {
        if ($request->has('entrada')) {
            return view('VistaProducto.entrada', compact('producto'));
        } else {
            $provedor = Provedor::all(); // Obtener todos los proveedores
            $categoria = Categoria::all();
            return view('VistaProducto.edit', compact('producto', 'provedor', 'categoria'));
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $r, producto $producto)
    {
        if ($r->has('entrada')) {
            $user = auth()->user();
            if ($user) {
                $notadeentrada = new notadeentrada();
                $notadeentrada->producto_id = $producto->id;
                $notadeentrada->users_id =  $user->id;
                $notadeentrada->cantidad = $r->input('cantidad');
                $notadeentrada->save();

                // Actualiza la cantidad en la tabla 'producto'
                
                $producto->cantidad += $r->input('cantidad');
                $producto->save();
            }
        } else {
            // Validación de los datos del formulario (puedes usar la función `validate`)
            $producto->codigo = $r->input('codigo');
            $producto->nombre = $r->input('nombre');
            $producto->precio = $r->input('precio');
            $producto->cantidad = $r->input('cantidad');
            $producto->autor = $r->input('autor');
            $producto->version = $r->input('version');
            $producto->editorial = $r->input('editorial');
            $producto->ubicacion = $r->input('ubicacion');
            $producto->proveedor_id = $r->input('proveedor_id');
            $producto->categoria_id = $r->input('categoria_id');
            // Actualiza otros campos según sea necesario
            $producto->save();
            activity()
                ->causedBy(auth()->user())
                ->log('Modifico el producto: ' . $producto->nombre);
        }

        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        activity()
            ->causedBy(auth()->user())
            ->log('Elimino el producto: ' . $producto->nombre);

        // Encuentra el producto por su ID y elimínalo
        $producto->delete();

        // Redirige de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente');
    }
}
