<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public function cliente()
    {
        return $this->belongsTo(cliente::class, 'cliente_id');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function detalleventas()
    {
        return $this->hasMany(Detalleventa::class);
    }

}
