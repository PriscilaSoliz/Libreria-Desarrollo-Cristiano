<?php

namespace App\Http\Controllers;

use App\Models\inventario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Categoria;
use App\Models\Provedor;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $productos = producto::with('provedor', 'categoria')->get();

    //     return view('Vistainventario.index', compact('productos'));
    // }
    public function index(Request $request)
    {
        $query = Producto::with('provedor', 'categoria');

        // Verificar y aplicar condiciones de filtro una por una
        if ($request->filled('provedor')) {
            // Excluir productos sin proveedor antes de aplicar el filtro
            $query->whereHas('provedor', function ($q) use ($request) {
                $q->where('nombre', $request->input('provedor'));
            })->whereNotNull('proveedor_id');
        }

        if ($request->filled('categoria')) {
            $query->whereHas('categoria', function ($q) use ($request) {
                $q->where('descripcion', $request->input('categoria'));
            });
        }
        if ($request->filled('editorial')) {
            $query->where('editorial', $request->input('editorial'));
        }

        if ($request->filled('ubicacion')) {
            $query->where('ubicacion', $request->input('ubicacion'));
        }

        if ($request->filled('stock')) {
            $query->where('cantidad', 0);
        }

        if ($request->filled('autor')) {
            $query->where('autor', $request->input('autor'));
        }

        // Repite este proceso para otras condiciones de filtro

        $productos = $query->get();

        // Obtén todas las opciones para los filtros
        $proveedores = provedor::whereNotNull('ci')->pluck('nombre'); // Excluir proveedores nulos
        $categorias = Categoria::pluck('descripcion');
        $editoriales = Producto::pluck('editorial')->unique()->filter();
        $ubicaciones = Producto::pluck('ubicacion')->unique()->filter();
        $stocks = Producto::where('cantidad', 0)->pluck('cantidad');

        $autores = Producto::pluck('autor')->unique()->filter();

        return view('Vistainventario.index', compact('productos', 'proveedores', 'categorias', 'editoriales', 'ubicaciones', 'stocks', 'autores'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(inventario $inventario)
    {
        //
    }
}
