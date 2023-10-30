<?php

namespace Database\Seeders;

use App\Models\detallec;
use App\Models\Detallecategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =Detallecategoria::create([
            'categoria_id'=> '1',
            'descripcion'=> 'Para todo publico',
            'producto_id'=> '1',
        ]);

        $user =Detallecategoria::create([
            "categoria_id"=> "2",
            "descripcion"=> "Para leer",
            "producto_id"=> "2",
        ]);

        $user =Detallecategoria::create([
            "categoria_id"=> "3",
            "descripcion"=> "Para leer mas",
            "producto_id"=> "3",
        ]);
    }
}
