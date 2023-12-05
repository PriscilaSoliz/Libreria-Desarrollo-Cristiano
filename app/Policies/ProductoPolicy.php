<?php

namespace App\Policies;

use App\Models\User;

class ProductoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function gestionarProducto(User $user)
    {
        // Lógica para determinar si el usuario puede gestionar productos
        // Por ejemplo, podrías revisar si el usuario tiene un rol específico.
        return $user->hasRole('admin');
    }
}
