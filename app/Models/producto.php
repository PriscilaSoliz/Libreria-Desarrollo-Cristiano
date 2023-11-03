<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    public function provedor()
    {
        return $this->belongsTo(Provedor::class, 'proveedor_id');
    }
    public function categoria()
    {
        return $this->belongsTo(categoria::class, 'categoria_id');
    }
}
