<?php

namespace Database\Seeders;

use App\Models\DocenteMateria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocenteMateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //primersemestres
        $user = DocenteMateria::create([
            'docente_id' => '1',
            'materia_id' => '3',
        ]);
        $user = DocenteMateria::create([
            'docente_id' => '2',
            'materia_id' => '3',
        ]);
    }
}
