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
        //
    }

    /**
     * Handle the detallecompra "restored" event.
     */
    public function restored(detallecompra $detallecompra): void
    {
        $producto = $detallecompra->producto;

        // Actualiza el stock antes de la creación
        $producto->cantidad += ($detallecompra->cantidad);
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
