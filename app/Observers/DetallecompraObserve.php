<?php

namespace App\Observers;

use App\Models\detallecompra;
use App\Models\producto;

class DetallecompraObserve
{
    /**
     * Handle the detallecompra "created" event.
     */
    public function creating(DetalleCompra $detallecompra): void
    {
        $producto = $detallecompra->producto;

        // Actualiza el stock antes de la creación
        $producto->cantidad += ($detallecompra->cantidad);
        activity()
            ->causedBy(auth()->user()) // Esto asume que estás utilizando el paquete spatie/laravel-activitylog
            ->log('Creó una nueva compra');

        $producto->save();
    }
    /**
     * Handle the detallecompra "updated" event.
     */
    public function updated(detallecompra $detallecompra): void
    {
        //
    }

    /**
     * Handle the detallecompra "deleted" event.
     */
    public function deleted(detallecompra $detallecompra): void
    {
        $producto = $detallecompra->producto;

        // Actualiza el stock antes de la creación
        $producto->cantidad -= ($detallecompra->cantidad);
        activity()
            ->causedBy(auth()->user()) // Esto asume que estás utilizando el paquete spatie/laravel-activitylog
            ->log('Creó una nueva compra');

        $producto->save();
    }

    /**
     * Handle the detallecompra "restored" event.
     */
    public function restored(detallecompra $detallecompra): void
    {
        $producto = $detallecompra->producto;

        // Actualiza el stock antes de la creación
        $producto->cantidad += ($detallecompra->cantidad);
        activity()
            ->causedBy(auth()->user()) // Esto asume que estás utilizando el paquete spatie/laravel-activitylog
            ->log('Aumento Stock al producto'.$producto->nombre);

        $producto->save();
    }

    /**
     * Handle the detallecompra "force deleted" event.
     */
    public function forceDeleted(detallecompra $detallecompra): void
    {
        //
    }
}
