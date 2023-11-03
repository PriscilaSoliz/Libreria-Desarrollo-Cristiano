<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    public function producto(){
    return $this->belongsTo(producto::class,'producto_id');
    }
    public function usuario(){
    return $this->belongsTo(users::class,'usuario_id');

    }
}
