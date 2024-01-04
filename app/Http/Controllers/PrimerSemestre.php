<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Lógica para mostrar la lista de usuarios
    }

    public function show($id)
    {
        // Lógica para mostrar un usuario específico
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación
    }

    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo usuario
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un usuario existente
    }

    public function destroy($id)
    {
        // Lógica para eliminar un usuario
    }
}
