<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $fillable = ['codigo,nombre,autor,version,editorial,precio,cantidad,ubicacion,imagen,proveedor_id,categoria_id'];
    public function provedor()
    {
        return $this->belongsTo(Provedor::class, 'proveedor_id');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


}
