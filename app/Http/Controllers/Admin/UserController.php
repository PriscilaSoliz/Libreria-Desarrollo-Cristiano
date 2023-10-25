<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.users.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)

    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($request->has('update_button') && $request->input('update_button') === 'update') {
            // Código para actualizar el correo electrónico y la contraseña
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();
            return redirect()->route('admin.users.index')->with('info', 'Se actualizó el usuario correctamente');
        } else {
            // Código para asignar roles
            $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.index')->with('info', 'Se asignaron los roles correctamente');
        }
    }


    // public function actualizar(Request $request, User $user){

    //      $user->email = $request->input('email');
    //      $user->password= $request->input('password');

    //      $user->save();
    //     return redirect()->route('admin.users.index')->with('info','Se asigno los roles
    //       correctamente');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        // Encuentra el producto por su ID y elimínalo
        $user->delete();
        // Redirige de vuelta a la lista de productos con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
