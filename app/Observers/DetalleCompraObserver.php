<?php
namespace App\Observers;
use App\Events\DetalleCompraCreated;


class DetalleCompraObserver
{
    public function created(DetalleCompraCreated $event)
    {
        $detalleCompra = $event->detalleCompra;
        $producto = $detalleCompra->producto;

        // Actualiza el stock
        $producto->cantidad += $detalleCompra->cantidad;
        $producto->save();
    }
}
