<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $semestre_id = 1; // Reemplaza con el id del semestre real
        //1
        $user = Materia::create([
            'nombre' => 'Ingles I',
            'sigla' => 'LIN100',
            'semestre_id' => $semestre_id,
        ]);
        //2
        $user = Materia::create([
            'nombre' => 'Introduccion a la Informatica',
            'sigla' => 'INF110',
            'semestre_id' => $semestre_id,
        ]);
        //3
        $user = Materia::create([
            'nombre' => 'Estructura Discretas',
            'sigla' => 'INF119',
            'semestre_id' => $semestre_id,
        ]);
        //4
        $user = Materia::create([
            'nombre' => 'Calculo I',
            'sigla' => 'MAT101',
            'semestre_id' => $semestre_id,
        ]);
        //5
        $user = Materia::create([
            'nombre' => 'Fisica I',
            'sigla' => 'FIS100',
            'semestre_id' => $semestre_id,
        ]);

        $semestre_id = 2; // Reemplaza con el id del semestre real
        //6
        $user = Materia::create([
            'nombre' => 'Programacion I',
            'sigla' => 'INF210',
            'semestre_id' => $semestre_id,
        ]);
    }
}
