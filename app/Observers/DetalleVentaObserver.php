<?php

namespace App\Observers;

use App\Models\Detalleventa;

class DetalleVentaObserver
{
    /**
     * Handle the Detalleventa "created" event.
     */
    public function created(Detalleventa $detalleventa): void
    {
        $producto = $detalleventa->producto;

        // Actualiza el stock antes de la creación
        $producto->cantidad -= ($detalleventa->cantidad);
        $producto->save();
    }

    /**
     * Handle the Detalleventa "updated" event.
     */
    public function updated(Detalleventa $detalleventa): void
    {
        //
    }

    /**
     * Handle the Detalleventa "deleted" event.
     */
    public function deleted(Detalleventa $detalleventa): void
    {
        //
    }

    /**
     * Handle the Detalleventa "restored" event.
     */
    public function restored(Detalleventa $detalleventa): void
    {
        $producto = $detalleventa->producto;

        // Actualiza el stock antes de la creación
        $producto->cantidad -= ($detalleventa->cantidad);
        $producto->save();
    }

    /**
     * Handle the Detalleventa "force deleted" event.
     */
    public function forceDeleted(Detalleventa $detalleventa): void
    {
        //
    }
}
