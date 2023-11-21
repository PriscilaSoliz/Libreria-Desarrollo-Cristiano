<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthObserver
{
    public function authenticated($user)
    {
        // Verificar si $user es realmente un modelo User antes de usarlo
        if ($user instanceof \App\Models\User) {
            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log('Inicio de sesión: ' . ($user->name ?? 'Usuario sin nombre'));
        } else {
            Log::error("El evento de inicio de sesión no proporcionó un modelo User válido.");
        }
    }   

    public function logout($event)
    {
        // Este evento probablemente no proporciona un usuario directamente
        // Puedes obtener el usuario actual a través de Auth::user() si está disponible

        $user = Auth::user();

        if ($user instanceof \App\Models\User) {
            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log('Cierre de sesión: ' . ($user->name ?? 'Usuario sin nombre'));
        } else {
            Log::error("El evento de cierre de sesión no proporcionó un modelo User válido.");
        }
    }
}
