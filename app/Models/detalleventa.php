<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleventa extends Model
{
    use HasFactory;
    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }

    public function Venta()
    {
        return $this->belongsTo(venta::class, 'venta_id');
    }
    

      // Método para obtener el cliente a través de la relación con Venta
      public function cliente()
      {
          // Se accede a través de la relación venta() definida en este modelo
          return $this->venta->cliente;
      }
}
