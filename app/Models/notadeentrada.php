<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notadeentrada extends Model
{
    use HasFactory;
    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
