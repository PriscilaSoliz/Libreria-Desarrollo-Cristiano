<?php

namespace Database\Seeders;

use App\Models\Semestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Semestre::create([
            'nombre'=>'primer',
        ]);
        $user = Semestre::create([
            'nombre'=>'segundo',
        ]);
        $user = Semestre::create([
            'nombre'=>'tercer',
        ]);
        $user = Semestre::create([
            'nombre'=>'cuarto',
        ]);
        $user = Semestre::create([
            'nombre'=>'quinto',
        ]);
        $user = Semestre::create([
            'nombre'=>'sexto',
        ]);
        $user = Semestre::create([
            'nombre'=>'septimo',
        ]);
        $user = Semestre::create([
            'nombre'=>'octavo',
        ]);
        $user = Semestre::create([
            'nombre'=>'noveno',
        ]);
    }
}
