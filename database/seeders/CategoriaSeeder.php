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
            'descripcion'=> 'Libros',
        ]);
        $user = Categoria::create([
            'descripcion'=> 'Biblias',
        ]);
        $user = Categoria::create([
            'descripcion'=> 'Acesorios',
        ]);
        $user = Categoria::create([
            'descripcion'=> 'Materiales Escolares',
        ]);
    }

}
