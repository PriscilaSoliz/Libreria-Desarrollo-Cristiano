<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notasalidaController extends Controller
{
    //
public function index()
{ 
// Código para mostrar una lista de elementos
return view('VistaNotaSalida.index');
    
}

public function show($id)
{
    // Código para mostrar un elemento específico
}

public function create()
{
    // Código para mostrar el formulario de creación
}

public function store(Request $request)
{
    // Código para guardar un nuevo elemento en la base de datos
}
}
