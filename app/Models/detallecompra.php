<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallecompra extends Model
{
    use HasFactory;
    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
    public function Compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

}
