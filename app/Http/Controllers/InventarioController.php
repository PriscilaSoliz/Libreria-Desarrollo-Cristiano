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
    public function index()
    {
        $productos = producto::with('provedor', 'categoria')->get();

        return view('Vistainventario.index', compact('productos'));
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
