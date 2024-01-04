<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey = 'ci';
    use HasFactory;
     // Definir la relación entre Cliente y Venta
     public function venta()
     {
         return $this->hasMany(Venta::class);
     }
}
