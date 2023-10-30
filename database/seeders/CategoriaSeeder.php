<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Categoria::create([
            'descripcion'=> 'PUBLICOS',
        ]);
        $user = Categoria::create([
            'descripcion'=> 'ESTUDIOS',
        ]);
        $user = Categoria::create([
            'descripcion'=> 'GUIA ESPIRITUAL',
        ]);
    }

}
