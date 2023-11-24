<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Models\Activity;

class AuthObserver
{
    public function authenticated(Login $event)
    {
        // Asegúrate de que $event->user es un modelo Eloquent (Illuminate\Database\Eloquent\Model)
        // Si $event->user es un usuario autenticable, accede a su modelo Eloquent asociado
        $userModel = $event->user instanceof \Illuminate\Database\Eloquent\Model
            ? $event->user
            : null;

        // Crear actividad de inicio de sesión
        activity()
            ->causedBy($userModel)
            ->log('Inicio de sesión');
    }

    public function logout(Logout $event)
    {
        // Asegúrate de que $event->user es un modelo Eloquent (Illuminate\Database\Eloquent\Model)
        // Si $event->user es un usuario autenticable, accede a su modelo Eloquent asociado
        $userModel = $event->user instanceof \Illuminate\Database\Eloquent\Model
            ? $event->user
            : null;

        // Crear actividad de cierre de sesión
        activity()
            ->causedBy($userModel)
            ->log('Cierre de sesión');
    }
    // public function authenticated($user)
    // {
    //     // Verificar si $user es realmente un modelo User antes de usarlo
    //     if ($user instanceof \App\Models\User) {
    //         activity()
    //             ->performedOn($user)
    //             ->causedBy($user)
    //             ->log('Inicio de sesión: ' . ($user->name ?? 'Usuario sin nombre'));
    //     } else {
    //         Log::error("El evento de inicio de sesión no proporcionó un modelo User válido.");
    //     }
    // }   

    // public function logout($event)
    // {
    //     // Este evento probablemente no proporciona un usuario directamente
    //     // Puedes obtener el usuario actual a través de Auth::user() si está disponible

    //     $user = Auth::user();

    //     if ($user instanceof \App\Models\User) {
    //         activity()
    //             ->performedOn($user)
    //             ->causedBy($user)
    //             ->log('Cierre de sesión: ' . ($user->name ?? 'Usuario sin nombre'));
    //     } else {
    //         Log::error("El evento de cierre de sesión no proporcionó un modelo User válido.");
    //     }
    // }
}
