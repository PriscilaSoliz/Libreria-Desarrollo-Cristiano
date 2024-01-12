<?php

namespace Database\Seeders;
use App\Models\Docente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        $user = Docente::create([
            'nombre'=>'Braulio Caceres',
        ]);
        //2
        $user = Docente::create([
            'nombre'=>'Katime Gutierrez',
        ]);
        //3
        $user = Docente::create([
            'nombre'=>'Ricardo Zuna',
        ]);
        //4
        $user = Docente::create([
            'nombre'=>'Juan Carlos Contreras',
        ]);
        //5
        $user = Docente::create([
            'nombre'=>'Alberto Mollo',
        ]);
    }
}
